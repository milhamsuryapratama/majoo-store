$(function () {
    $(".plus").click(function () {
        let row = $(this).closest('tr');
        let id = $(this).data('id');

        // alert(id)
        changeQty(id, 'plus', row);
    });

    $(".minus").click(function () {
        let row = $(this).closest('tr');
        let id = $(this).data('id');

        changeQty(id, 'minus', row);
    });

    $(".qty").keyup(function () {
        let row = $(this).closest('tr');
        let id = $(this).data('id');

        changeQty(id, null, row, $(this).val());
    });

    $(".qty").keypress(function (event) {
        if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
            event.preventDefault();
            return
        }
    });
});

function changeQty(product_id, action, row, val = null) {
    if (val != '') {
        $.ajax({
            url: base_url + '/cart/change_qty',
            type: 'POST',
            data: {
                'product_id': product_id,
                'action': action,
                'val': val
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response, statusText, xhr) {
                console.log(response)
                if (response != 'Out of stock !') {
                    row.find('.qty').val(response.data.qty);
                    $(".total").html('Rp.' + rupiah(response.data.total[0].total));
                    row.find('.subtotal').html('Rp.' + rupiah(response.data.subtotal));
                    row.find('.out').html(response);
                    $("#checkout").prop('disabled',false);
                } else {
                    $("#checkout").prop('disabled',true);
                    row.find('.out').html(response);
                }
            },
            error: function (error) {
                console.log(error)
            }
        })
    }
}

function rupiah(angka){
    var reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return ribuan;
}