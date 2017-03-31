$(function () {
    $hasExtraComments = $('#has_extra_comments');
    $extraCommentsTitle = $('#extra_comments_title');

    $hasExtraComments.on('change', () => {
        $extraCommentsTitle.parent().toggleClass('disabled');
    });

    if ($hasExtraComments.parent().checkbox('is checked')) {
        $extraCommentsTitle.parent().removeClass('disabled');
    } else {
        $extraCommentsTitle.parent().addClass('disabled');
    }
});