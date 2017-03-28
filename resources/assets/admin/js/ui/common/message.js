import '../../../semantic/src/definitions/modules/transition';

$(function () {
    $('.message .close')
        .on('click', function () {
            $(this)
                .closest('.message')
                .transition('fade')
            ;
        })
    ;
});