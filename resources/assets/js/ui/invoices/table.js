$('table.selectable tr').on('click', e => {
    let href = $(e.currentTarget).data("href");

    if (href) {
        window.location = href;
    }
});