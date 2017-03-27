import '../../../semantic/src/definitions/behaviors/visibility';
import '../../../semantic/src/definitions/modules/sidebar';
import '../../../semantic/src/definitions/modules/dropdown';

$(function () {
    $('.main.menu').visibility({
        type: 'fixed'
    });

    $('#sidebar-toggle').on('click', () => {
        $('#sidebar-menu').sidebar('toggle');
    });

    $('.ui.dropdown').dropdown();

    $('#logout-trigger').on('click', () => $('#logout-form').submit());
});