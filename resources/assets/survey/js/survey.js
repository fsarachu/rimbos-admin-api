$(function () {
    let $surveyForm = $('.survey.form');
    let $optionRows = $('.option.row');

    $optionRows.on('click', function (e) {
        $optionRows.removeClass('selected');
        let $target = $(e.currentTarget);
        let $targetRadio = $target.find(':radio');
        $target.addClass('selected');
        $targetRadio.prop('checked', true);
    });

    $surveyForm.on('submit', e => {
        let $target = $(e.currentTarget);

        let values = getFormValues($target);

        if (!values.rating) {
            e.preventDefault();
            alert('Debes calificar el servicio');
        }
    });
});

function getFormValues($form) {
    return $form.serializeArray().reduce(function (obj, item) {
        obj[item.name] = item.value;
        return obj;
    }, {})
}
