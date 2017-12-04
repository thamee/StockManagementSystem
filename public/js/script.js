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
        $('#n').val($(this).data('pro_name'));
        $('#cid').val($(this).data('pro_cat'));
        $('#gid').val($(this).data('pro_img'));
        $('#uid').val($(this).data('unit'));
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
                'pro_name': $('#n').val(),
                'pro_cat': $('#cid').val(),
                'pro_img': $('#gid').val(),
                'unit': $('#uid').val()
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.pro_name +"</td><td>" + data.pro_cat +"</td><td>" + data.pro_img + "</td><td>" + data.unit + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-pro_name='" + data.pro_name +"' data-pro_cat='" + data.pro_cat + "' data-pro_img='" + data.pro_img +"' data-unit='" + data.unit +"'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-pro_name='" + data.pro_name +"' data-pro_cat='" + data.pro_img +"' data-pro_img='" + data.pro_cat +"' data-unit='" + data.unit +    "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
    });




    $("#add").click(function() {

        $.ajax({
            type: 'post',
            url: '/addItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'pro_name': $('input[name=pro_name]').val(),
                'pro_cat': $('input[name=pro_cat]').val(),
                'pro_img': $('input[name=pro_img]').val(),
                'unit': $('input[name=unit]').val()
            },
            success: function(data) {
                if ((data.errors)){
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.pro_name);
                    $('.error').text(data.errors.pro_cat);
                    $('.error').text(data.errors.pro_img);
                    $('.error').text(data.errors.unit);
                }
                else {
                    $('.error').addClass('hidden');
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.pro_name +"</td><td>" + data.pro_cat +"</td><td>" + data.pro_img + "</td><td>" + data.unit +"</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-pro_name='" + data.pro_name +"' data-pro_cat='" + data.pro_cat + "' data-pro_img='" + data.pro_img +"' data-unit='" + data.unit +"'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-pro_name='" + data.pro_name + "' data-pro_cat='" + data.pro_cat + "' data-pro_img='" + data.pro_img +"' data-unit='" + data.unit +"'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },

        });
        $('#pro_name').val('');
        $('#pro_cat').val('');
        $('#pro_img').val('');
        $('#unit').val('');
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
});
