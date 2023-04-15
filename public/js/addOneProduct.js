$(document).ready(function () {
    // Установка заголовка CSRF-токена в заголовок каждого Ajax-запроса
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.my-anime').click(function () {
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 1150,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Товар добавлен'
        })
    });



// Обработчик события нажатия на кнопку "Добавить в корзину"
$('.add-to-basket').click(function (e) {
    e.preventDefault();

    // Получение ID товара и его количества из кнопки
    let productId = $(this).data('product-id');
    let count = $(this).data('product-count');

    // Отправка POST-запроса на сервер для добавления товара в корзину
    $.ajax({
        url: '/basket/addd/' + productId,
        type: 'GET',
        data: {
            count: count
        },
        success: function (data) {
            // Обновление счетчика товаров в корзине и вывод сообщения
            // $('.basket-count').text(data.total_products);
        },
        error: function () {
            console.log('Произошла ошибка при добавлении товара в корзину.');
        }
    });
});
})
;
