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

    $('.reload').click(function () {
        location.reload();
    });

    $('#orderStatus').click(function () {
        $('#order-status').submit();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Add cart
    $('.add-cart').click(function () {
        var product_id = $(this).attr('product-id');
        var input = $('input[product-id="' + product_id + '"]');
        var qty = input.val();
        var url = input.attr('data-href');
        $.ajax({
            url: url,
            method: 'post',
            dataType: 'json',
            data: {'product_id': product_id, 'qty': qty},
            success: function (result) {
                if (!!result.error) {
                    alertify.error(result.msg);
                } else {
                    alertify.success(result.msg);
                }
            }
        });
    });

    //update cart
    $('td > input').change(function () {
        var qty = $(this).val();
        var url = $(this).closest('tr').attr('data-href');
        $.ajax({
            url: url,
            method: 'post',
            dataType: 'json',
            data: {'_method': 'PUT', 'qty': qty},
            success: function (result) {
                if (!!result.error) {
                    alertify.error(result.msg);
                } else {
                    alertify.success(result.msg);
                }
            }
        });
    });

    //remove item
    $('button.remove-product').click(function () {
        var tr = $(this).closest('[row-id]');
        var rowId = tr.attr('row-id');
        var url = $(this).attr('data-href');
        $.ajax({
            url: url,
            method: 'post',
            dataType: 'json',
            data: {'rowId': rowId},
            success: function (result) {
                if (!!result.error) {
                    alertify.error(result.msg);
                } else {
                    tr.hide();
                    alertify.success(result.msg);
                }
            }
        });
    });

    //delete cart
    $('#delete-cart').click(function () {
        var url = $(this).attr('data-href');
        alertify.confirm('Delete cart ?', function (ev) {
            ev.preventDefault();
            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: {'_method': 'DELETE'},
                success: function (result) {
                    if (!!result.error) {
                        alertify.notify(result.msg, 'error', 1);
                        return;
                    } else {
                        $('table >tbody').hide();
                        alertify.notify(result.msg, 'success', 1);
                        location.reload();
                    }
                }
            });
        }, function (ev) {
            ev.preventDefault();
            return;
        });
    });

    $('input:radio').click(function () {
        var product_id = $(this).closest('div[product-id]').attr('product-id');
        var url = $(this).parent().attr('data-href');
        $.ajax({
            url: url,
            method: 'POST',
            data: {'product_id': product_id, 'point': $(this).val()},
            success: function (result) {
                if (!!result.error) {
                    alertify.error(result.msg);
                } else {
                    $('#point').html(result.avg);
                }
            }
        });
    })
});
