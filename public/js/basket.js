$(document).ready(function () {
    // Открыть модальное окно при клике на кнопку "Корзина"

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
    $('#openBasketModal').on('click', function () {
        getBasket();
    });

    // Закрыть модальное окно при клике на кнопку "Закрыть"
    $('#closeBasketModal').on('click', function () {
        $('#basketModal').modal('hide');

    });
});


//  код для получения данных корзины и их отображения в таблице
function getBasket() {
    $.ajax({
        url: '/basket/json',
        method: 'GET',
        data: {

        },
        success: function (response) {
            let htmls = "";
            let totalPrice = response.total_price;
            response.products.forEach((product, key) => {
                let html = '<tr>';
                html += '<td><a href="http://myfirstshop/product/' + product.id + '">' +
                    '<img height="56px" src="storage/' + product.image + '" style="margin-right: 10px">' + product.name + '</a></td>'
                html += '<td><span class="span" style="margin-right: 10px">' + product.count + '</span>' +
                    '<div class="btn-group form-inline">' +
                    '<button class="btn btn-success button_plus " style="padding-left: 8px" data-id="' + product.id + '">+</button>' +
                    '<button class="btn btn-danger button_minus  "   data-id="' + product.id + '">-</button>' +
                    '</div></td>'
                html += '<td class="price">' + product.price + ' ₴</td>'
                html += '<td class="price_sum">' + product.fullPrice + ' ₴</td>'
                html += '<td class="text-right"><button type="button" class="btn btn-danger btn-sm remove-product" data-id="' + product.id + '">Удалить</button></td>'
                html += '</tr>';
                htmls += html;
            });
            htmls += '<tr>' +
                '<td colspan="3">Общая стоимость:</td>' +
                '<td colspan="2">' + totalPrice + ' ₴</td>' +
                '</tr>';

            $('.products_body').html(htmls);
            $('#basketModal').modal('show');//отображает модальное окно

            $('.button_plus').on('click', function () {
                let id = $(this).attr('data-id');

                $.ajax({
                    url: '/basket/addd/' + id,
                    method: 'GET',
                    data: {},
                    success: function (response) {
                        getBasket();
                    }
                });
            });

            $('.button_minus').on('click', function () {
                let id = $(this).attr('data-id');

                $.ajax({
                    url: '/basket/remove/' + id,
                    method: 'GET',
                    data: {},
                    success: function (response) {
                        getBasket();
                    }
                });
            });

            $('.remove-product').on('click', function () {
                let id = $(this).attr('data-id');

                $.ajax({
                    url: '/basket/removeall/' + id,
                    method: 'GET',
                    data: {},
                    success: function (response) {
                        getBasket();
                    }
                });
            });
            $('#checkoutButton').on('click', function () {
                $.ajax({
                    url: '/order',
                    method: 'POST',
                    data: {},
                    success: function (response) {
                        // Обработка успешного оформления заказа
                        $('#basketModal').modal('hide');
                    },
                    error: function (response) {
                        // Обработка ошибки оформления заказа
                    }
                });
            });
        },
        error: function (response) {

        }
    });
}
