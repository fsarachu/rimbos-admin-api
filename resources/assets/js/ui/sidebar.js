import '../../semantic/src/definitions/modules/sidebar';

$('#sidebar-toggle').on('click', () => {
    $('#sidebar-menu').sidebar('toggle');
});