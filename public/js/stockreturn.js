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
        $('#gid').val($(this).data('sup_id'));
        $('#uid').val($(this).data('sup_name'));
        $('#pid').val($(this).data('received_date'));
        $('#lid').val($(this).data('return_date'));
        $('#mid').val($(this).data('stock_amount'));
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
        $('#gid').val($(this).data('sup_id'));
        $('#uid').val($(this).data('sup_name'));
        $('#pid').val($(this).data('received_date'));
        $('#lid').val($(this).data('return_date'));
        $('#mid').val($(this).data('stock_amount'));
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
            url: '/editItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'stock_no': $('#n').val(),
                'stock_name': $('#cid').val(),
                'sup_id': $('#gid').val(),
                'sup_name': $('#uid').val(),
                'received_date': $('#pid').val(),
                'return_date': $('#lid').val(),
                'stock_amount': $('#mid').val(),
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.stock_no +"</td><td>" + data.stock_name +"</td><td>" + data.sup_id + "</td><td>" + data.sup_name + "</td><td>" + data.received_date +"</td><td>" + data.return_date +"</td><td>" + data.stock_amount +"</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-stock_no='" + data.stock_no +"' data-stock_name='" + data.stock_name + "' data-sup_id='" + data.sup_id +"' data-sup_name='" + data.sup_name +"' data-received_date='" + data.received_date +"' data-return_date='" + data.return_date +"' data-stock_amount='" + data.stock_amount +"'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-stock_no='" + data.stock_no +"' data-stock_name='" + data.stock_name +"' data-sup_id='" + data.sup_id +"' data-sup_name='" + data.sup_name +"' data-received_date='" + data.received_date +"' data-return_date='" + data.return_date + "' data-stock_amount='" + data.stock_amount +   "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
    });




    $("#add").click(function() {

        $.ajax({
            type: 'post',
            url: '/addItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'stock_no': $('input[name=stock_no]').val(),
                'stock_name': $('input[name=stock_name]').val(),
                'sup_id': $('input[name=sup_id]').val(),
                'sup_name': $('input[name=sup_name]').val(),
                'received_date': $('input[name=received_date]').val(),
                'return_date': $('input[name=return_date]').val(),
                'stock_amount': $('input[name=stock_amount]').val(),

            },
            success: function(data) {
                if ((data.errors)){
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.stock_no);
                    $('.error').text(data.errors.stock_name);
                    $('.error').text(data.errors.sup_id);
                    $('.error').text(data.errors.sup_name);
                    $('.error').text(data.errors.rece);
                }
                else {
                    $('.error').addClass('hidden');
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.sup_id +"</td><td>" + data.sup_name +"</td><td>" + data.address + "</td><td>" + data.contact_no +"</td><td>" + data.email +"</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-sup_id='" + data.sup_id +"' data-sup_name='" + data.sup_name + "' data-address='" + data.address +"' data-contact_no='" + data.contact_no +"' data-email='" + data.email +"'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-sup_id='" + data.sup_id + "' data-sup_name='" + data.sup_name + "' data-address='" + data.address +"' data-contact_no='" + data.contact_no +"' data-email='" + data.email +"'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },

        });
        $('#sup_id').val('');
        $('#sup_name').val('');
        $('#address').val('');
        $('#contact_no').val('');
        $('#email').val('');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteItem',
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
