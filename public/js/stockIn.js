$(document).ready(function() {
    $("#add").click(function() {

        $.ajax({
            type: 'post',
            url: '/addStockin',
            data: {
                '_token': $('input[name=_token]').val(),
                'order_no': $('input[name=order_no]').val(),
                'sup_id': $('input[name=sup_id]').val(),
                'order_date': $('input[name=order_date]').val(),
                'stock_no': $('input[name=stock_no]').val(),
                'stock_name': $('input[name=stock_name]').val(),
                'stock_unit': $('input[name=stock_unit]').val(),
                'stock_amount': $('input[name=stock_amount]').val()
            },
            success: function(data) {
                if ((data.errors)){
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.order_no);
                    $('.error').text(data.errors.sup_id);
                    $('.error').text(data.errors.order_date);
                    $('.error').text(data.errors.stock_no);
                    $('.error').text(data.errors.stock_name);
                    $('.error').text(data.errors.stock_unit);
                    $('.error').text(data.errors.stock_amount);
                }
                else {
                    $('.error').addClass('hidden');

                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.order_no +"</td><td>" + data.sup_id +"</td><td>" + data.order_date + "</td><td>" + data.stock_no +"</td><td>" + data.stock_name +"</td><td>" + data.stock_unit +"</td><td>" + data.stock_amount +"</tr>");







    }
            },

        });
        $('#order_no').val('');
        $('#sup_id').val('');
        $('#order_date').val('');
        $('#stock_no').val('');
        $('#stock_name').val('');
        $('#stock_unit').val('');
        $('#stock_amount').val('');
    });


    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmProducts').trigger("reset");
        $('#bt').modal('show');
    });




});
