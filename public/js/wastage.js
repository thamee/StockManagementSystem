$(document).ready(function() {
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text("Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('stock_no'));
        $('#cid').val($(this).data('stock_name'));
        $('#gid').val($(this).data('stock_unit'));
        $('#uid').val($(this).data('amount_of_wastage'));
        $('#myModal').modal('show');
    });




    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text("Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('stock_no'));
        $('#cid').val($(this).data('stock_name'));
        $('#gid').val($(this).data('stock_unit'));
        $('#uid').val($(this).data('amount_of_wastage'));
        $('#myModal').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function() {

        $.ajax({
            type: 'post',
            url: '/wasedit',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'stock_no': $('#n').val(),
                'stock_name': $('#cid').val(),
                'stock_unit': $('#gid').val(),
                'amount_of_wastage': $('#uid').val(),
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.stock_no +"</td><td>" + data.stock_name +"</td><td>" + data.stock_unit + "</td><td>" + data.stock_unit + "</td><td>" + data.amount_of_wastage +"</td><td>" + data.amount_of_wastage  +"</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-stock_no='" + data.stock_no +"' data-stock_name='" + data.stock_name + "' data-stock_unit='" + data.stock_unit +"' data-amount_of_wastage='" + data.amount_of_wastage +"'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-stock_no='" + data.stock_no +"' data-stock_name='" + data.stock_name +"' data-stock_unit='" + data.stock_unit +"' data-amount_of_wastage='" + data.amount_of_wastage  +   "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
    });




    $("#add").click(function() {

        $.ajax({
            type: 'post',
            url: '/wasadd',
            data: {
                '_token': $('input[name=_token]').val(),
                'stock_no': $('input[name=stock_no]').val(),
                'stock_name': $('input[name=stock_name]').val(),
                'stock_unit': $('input[name=stock_unit]').val(),
                'amount_of_wastage': $('input[name=amount_of_wastage]').val(),

            },
            success: function(data) {
                if ((data.errors)){
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.stock_no);
                    $('.error').text(data.errors.stock_name);
                    $('.error').text(data.errors.stock_unit);
                    $('.error').text(data.errors.amount_of_wastage);
                }
                else {
                    $('.error').addClass('hidden');
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.stock_no +"</td><td>" + data.stock_name +"</td><td>" + data.stock_unit + "</td><td>" + data.amount_of_wastage +"'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },

        });
        $('#stock_no').val('');
        $('#stock_name').val('');
        $('#stock_unit').val('');
        $('#amount_of_wastage').val('');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/wasdelete',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });

    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmProducts').trigger("reset");
        $('#bt').modal('show');
    });




});
