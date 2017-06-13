$(document).ready(function () {
    if ($('textarea').length) {
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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('input:radio').click(function () {
        var product_id = $(this).closest('div[product-id]').attr('product-id');
        var url = $(this).parent().attr('data-href');
        $.ajax({
            url: url,
            method: 'POST',
            data: {"product_id": product_id, "point": $(this).val()},
            success: function (result) {
                if (!!result.error){
                    alert(result.msg);
                    return;
                }
                $('#point').html(result.avg);
            }
        });
    })
});
