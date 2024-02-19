jQuery(document).ready(function ($) {
    $('#convert-button').on('click', function () {
        var amount = $('#amount').val();
        var fromCurrency = $('#currency-from').val();
        var toCurrency = $('#currency-to').val();

        // Validate input
        if (!amount || isNaN(amount) || amount <= 0) {
            alert('Please enter a valid amount.');
            return;
        }

        // AJAX request
        $.ajax({
            type: 'POST',
            url: currency_converter_ajax_object.ajaxurl,
            data: {
                action: 'currency_converter',
                amount: amount,
                from_currency: fromCurrency,
                to_currency: toCurrency,
            },
            success: function (response) {
                if (!isNaN(response)) {
                    $('#result').val(response);
                } else {
                    alert('Error: ' + response);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('AJAX Error: ' + textStatus + ' - ' + errorThrown);
            }
        });
    });
});
