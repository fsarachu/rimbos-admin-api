import '../../semantic/src/definitions/modules/transition';

$('.message .close')
    .on('click', function () {
        $(this)
            .closest('.message')
            .transition('fade')
        ;
    })
;