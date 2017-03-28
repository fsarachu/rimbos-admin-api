import '../../../semantic/src/definitions/modules/transition';
import '../../../semantic/src/definitions/modules/dropdown';
import '../../../semantic/src/definitions/modules/checkbox';
import '../../../semantic/src/definitions/modules/popup';
import 'semantic-ui-calendar/src/definitions/modules/calendar'

$(function () {
    /* jQuery objects caching */
    let $dropdowns = $('.dropdown.selection');
    let $checkboxes = $('.ui.checkbox');

    let $calendar = $('#calendar');
    let $tripInput = $('#trip');
    let $countryDropdown = $('#country-dropdown');
    let $descriptionTextarea = $('#description');
    let $businessNameInput = $('#business_name');
    let $invoiceNumberInput = $('#invoice_number');
    let $categoryDropdown = $('#category-dropdown');
    let $paymentMethodDropdown = $('#payment-method-dropdown');
    let $currencyDropdown = $('#currency-dropdown');
    let $amountInOriginalCurrencyInput = $('#amount_in_original_currency');
    let $oneDollarRateInput = $('#one_dollar_rate');
    let $amountInDollars = $('#amount_in_dollars');
    let $includeRutCheckbox = $('#include_rut');
    let $assignAniiCheckbox = $('#assign_anii');
    let $personalSpendingCheckbox = $('#personal_spending');

    /* Options variables */
    let calendarOptions = {
        type: 'date',
        formatter: {
            date: formatDate
        }
    };

    /* Enable Form Javascript Components */
    $dropdowns.dropdown();
    $checkboxes.checkbox();
    $calendar.calendar(calendarOptions);

    /* Initialize fields */
    let defaultValues = window.defaultValues;

    $calendar.calendar('set date', (defaultValues.date) ? defaultValues.date : new Date());
    $tripInput.attr('value', (defaultValues.trip) ? defaultValues.trip : null);
    $countryDropdown.dropdown('set selected', (defaultValues.country_id) ? defaultValues.country_id : null);
    $descriptionTextarea.text((defaultValues.description) ? defaultValues.description : '');
    $businessNameInput.attr('value', (defaultValues.business_name) ? defaultValues.business_name : null);
    $invoiceNumberInput.attr('value', (defaultValues.invoice_number) ? defaultValues.invoice_number : null);
    $categoryDropdown.dropdown('set selected', (defaultValues.category_id) ? defaultValues.category_id : null);
    $paymentMethodDropdown.dropdown('set selected', (defaultValues.payment_method_id) ? defaultValues.payment_method_id : null);
    $currencyDropdown.dropdown('set selected', (defaultValues.currency_id) ? defaultValues.currency_id : null);
    $amountInOriginalCurrencyInput.attr('value', (defaultValues.amount_in_original_currency) ? defaultValues.amount_in_original_currency : null);
    $oneDollarRateInput.attr('value', (defaultValues.one_dollar_rate) ? defaultValues.one_dollar_rate : null);
    $amountInDollars.val('$' + getAmountInDollars());

    if (defaultValues.includes_rut) {
        $includeRutCheckbox.check();
    }

    if (defaultValues.assign_anii) {
        $assignAniiCheckbox.check();
    }

    if (defaultValues.personal_spending) {
        $personalSpendingCheckbox.check();
    }

    /* Register Event Listeners*/
    $amountInOriginalCurrencyInput.on('keyup blur change', () => $('#amount_in_dollars').val('$' + getAmountInDollars()));
    $oneDollarRateInput.on('keyup blur change', () => $('#amount_in_dollars').val('$' + getAmountInDollars()));

});


/* Helper Functions */
function zeroFill(number, width) {
    width -= number.toString().length;
    if (width > 0) {
        return new Array(width + (/\./.test(number) ? 2 : 1)).join('0') + number;
    }
    return number + ""; // always return a string
}

function formatDate(date) {
    if (!date) {
        return '';
    }

    let day = date.getDate();
    let month = date.getMonth() + 1;
    let year = date.getFullYear();

    return year + '-' + zeroFill(month, 2) + '-' + zeroFill(day, 2);
}

function getAmountInDollars() {
    let amountInOriginalCurrency = parseFloat($('#amount_in_original_currency').val()) || 0.0;
    let oneDollarRate = parseFloat($('#one_dollar_rate').val()) || 0.0;

    let amountInDollars = oneDollarRate === 0 ? 0 : amountInOriginalCurrency / oneDollarRate;

    return amountInDollars.toFixed(2);
}
