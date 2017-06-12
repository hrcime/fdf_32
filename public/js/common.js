$(document).ready(function () {
    if ($('textarea').length){
        var textarea = $('textarea').attr('name');
        CKEDITOR.replace(textarea);
    }

    $('form#delete').submit(function (e) {
        e.preventDefault();
        var id = $(this).find('input[value=Delete]').attr('data-id');
        if (confirm('DELETE ID : ' + id)) {
            this.submit();
        }
    });
});
