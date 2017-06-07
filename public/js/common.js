//DELETE OBJ
$(document).ready(function () {
    $('form#delete').submit(function (e) {
        e.preventDefault();
        var id = $(this).find('input[value=Delete]').attr('data-id');
        if (confirm('DELETE ID : ' + id)) {
            this.submit();
        }
    });
});
