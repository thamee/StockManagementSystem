$('#dat').onclick(function() {

// get the current date

    var date = new Date();

    var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();


// Disable all dates till today

    $('#datepicker').datepicker({

        minDate: new Date(y, m, d+3),

        dateFormat: 'mm-dd-yy',
        defaultDate: "-34d",
        showOtherMonths: true,
        changeYear: true,
        changeMonth: true,
        showMonthAfterYear: true,

    });

    function enableFirday(date) {

        var day = date.getDay();

        return [(day == 5), ''];

    }

});