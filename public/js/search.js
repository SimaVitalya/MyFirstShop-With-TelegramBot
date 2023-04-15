$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }

    });
    $('.product_sorting_btn').click(function() {
        // Получаем текст из выбранного элемента li
        let text = $(this).text();

        // Меняем текст у span на выбранный
        $('#search_name').text(text);
    });

    $('.product_sorting_btn').click(function () {
        let orderBy = $(this).attr('data-order')
        $.ajax({
            url: '/products',
            method: 'GET',
            data: {orderBy: orderBy},
            success: function (data) {
                $('.custom_filter').html(data)
            }
        });
    })
});
