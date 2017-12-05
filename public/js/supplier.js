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
        $('#n').val($(this).data('sup_id'));
        $('#cid').val($(this).data('sup_name'));
        $('#gid').val($(this).data('address'));
        $('#uid').val($(this).data('contact_no'));
        $('#pid').val($(this).data('email'));
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
        $('#n').val($(this).data('sup_id'));
        $('#cid').val($(this).data('sup_name'));
        $('#gid').val($(this).data('address'));
        $('#uid').val($(this).data('contact_no'));
        $('#pid').val($(this).data('email'));
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
                'sup_id': $('#n').val(),
                'sup_name': $('#cid').val(),
                'address': $('#gid').val(),
                'contact_no': $('#uid').val(),
                'email': $('#pid').val(),
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.sup_id +"</td><td>" + data.sup_name +"</td><td>" + data.address + "</td><td>" + data.contact_no + "</td><td>" + data.email +"</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-sup_id='" + data.sup_id +"' data-sup_name='" + data.sup_name + "' data-address='" + data.address +"' data-contact_no='" + data.contact_no +"'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-sup_id='" + data.sup_id +"' data-sup_name='" + data.sup_name +"' data-address='" + data.address +"' data-contact_no='" + data.contact_no +    "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
    });




    $("#add").click(function() {

        $.ajax({
            type: 'post',
            url: '/addItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'sup_id': $('input[name=sup_id]').val(),
                'sup_name': $('input[name=sup_name]').val(),
                'address': $('input[name=address]').val(),
                'contact_no': $('input[name=contact_no]').val(),
                'email': $('input[name=email]').val()
            },
            success: function(data) {
                if ((data.errors)){
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.sup_id);
                    $('.error').text(data.errors.sup_name);
                    $('.error').text(data.errors.address);
                    $('.error').text(data.errors.contact_no);
                    $('.error').text(data.errors.email);
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
