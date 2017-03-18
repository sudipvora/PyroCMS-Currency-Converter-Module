$(function () {

    // Handle calculator events.
    $('.currencyx-calculator').each(function () {
        var $this = $(this),
            $currencyFrom = $this.find('.currencyx-from'),
            $currencyTo = $this.find('.currencyx-to'),
            $amount = $this.find('.currencyx-amount'),
            $result = $this.find('.currencyx-result');

        // Recalculate currency change.
        $currencyFrom.add($currencyTo).add($amount).on('change keyup', function () {
            var rateFrom = parseFloat($currencyFrom.val());
            var rateTo = parseFloat($currencyTo.val());
            var amount = parseFloat($amount.val());

            // Calculate the result if input data valid.
            if (isNaN(rateFrom) || isNaN(rateTo) || isNaN(amount)) {
                $result.val('');
            } else {
                amount = (rateTo / rateFrom) * amount;
                $result.val(amount.toFixed(2));
            }
        }).triggerHandler('change');
    })

});