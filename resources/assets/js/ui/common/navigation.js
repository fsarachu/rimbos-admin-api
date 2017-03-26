import '../../../semantic/src/definitions/modules/sidebar';
import '../../../semantic/src/definitions/modules/dropdown';

$('#sidebar-toggle').on('click', () => {
    $('#sidebar-menu').sidebar('toggle');
});
