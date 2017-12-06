$(document).ready(function() {
    $("#add").click(function() {

        $.ajax({
            type: 'post',
            url: '/addStockout',
            data: {
                '_token': $('input[name=_token]').val(),
                'stock_no': $('input[name=stock_no]').val(),
                'stock_name': $('input[name=stock_name]').val(),
                'date': $('input[name=date]').val(),
                'stock_amount': $('input[name=stock_amount]').val(),
                'stock_unit': $('input[name=stock_unit]').val(),
                // 'stock_unit': $('input[name=stock_unit]').val(),
                // 'stock_amount': $('input[name=stock_amount]').val()
            },
            // tag: {
            //     '_token': $('input[name=_token]').val(),
            //     'stock_no': $('input[name=stock_no]').val(),
            //     'stock_amount': $('input[name=stock_amount]').val()
            // },
            success: function(data) {
                if ((data.errors)){
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.stock_no);
                    $('.error').text(data.errors.stock_name);
                    $('.error').text(data.errors.date);
                    $('.error').text(data.errors.stock_amount);
                    $('.error').text(data.errors.stock_unit);
                    // $('.error').text(data.errors.stock_unit);
                    // $('.error').text(data.errors.stock_amount);

                }
                else {
                    $('.error').addClass('hidden');
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.stock_no +"</td><td>" + data.stock_name +"</td><td>" + data.date + "</td><td>" + data.stock_amount +"</td><td>" + data.stock_unit  +"</td></tr>");

                }
            },

            // success: function(tag) {
            //     if ((tag.errors)){
            //         $('.error').removeClass('hidden');
            //         $('.error').text(tag.errors.stock_no);
            //         $('.error').text(tag.errors.stock_amount);
            //
            //     }
            //     else {
            //         $('.error').addClass('hidden');
            //
            //         // $('#stock').append("<tr class='item" + tag.id + "'><td>" + tag.id + "</td><td>" + tag.stock_no +"</td><td>" + tag.stock_amount +"</td></tr>");
            //
            //     }
            // },
        });
        $('#stock_no').val('');
        $('#stock_name').val('');
        $('#date').val('');
        $('#stock_amount').val('');
        $('#stock_unit').val('');
    });


    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmProducts').trigger("reset");
        $('#bt').modal('show');
    });
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

});
