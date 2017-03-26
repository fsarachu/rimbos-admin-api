import '../../../semantic/src/definitions/modules/sidebar';
import '../../../semantic/src/definitions/modules/dropdown';

$('#sidebar-toggle').on('click', () => {
    $('#sidebar-menu').sidebar('toggle');
});

$('.ui.dropdown').dropdown();

$('#logout-trigger').on('click', () => $('#logout-form').submit());