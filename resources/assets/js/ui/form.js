import '../../semantic/src/definitions/modules/transition';
import '../../semantic/src/definitions/modules/dropdown';
import '../../semantic/src/definitions/modules/checkbox';
import '../../semantic/src/definitions/modules/popup';
import '../../../../node_modules/semantic-ui-calendar/src/definitions/modules/calendar'

/* jQuery objects caching */
let $dropdowns = $('.dropdown.selection');
let $checkboxes = $('.ui.checkbox');
let $calendar = $('#calendar');
let $tripInput = $('#trip');
let $countryDropdown = $('#country-dropdown');
let $currencyDropdown = $('#currency-dropdown');
let $amountInOriginalCurrencyInput = $('#amount_in_original_currency');
let $oneDollarRateInput = $('#one_dollar_rate');
let $amountInDollars = $('#amount_in_dollars');

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
$amountInDollars.val('$' + getAmountInDollars());
$calendar.calendar('set date', new Date());

if (window.lastInvoice) {
    $tripInput.attr('value', window.lastInvoice.trip);
    $countryDropdown.dropdown('set selected', window.lastInvoice.country_id);
    $currencyDropdown.dropdown('set selected', window.lastInvoice.currency_id);
    $oneDollarRateInput.attr('value', window.lastInvoice.one_dollar_rate);
}

/* Register Event Listeners*/
$amountInOriginalCurrencyInput.on('keyup blur change', () => $('#amount_in_dollars').val('$' + getAmountInDollars()));
$oneDollarRateInput.on('keyup blur change', () => $('#amount_in_dollars').val('$' + getAmountInDollars()));

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
