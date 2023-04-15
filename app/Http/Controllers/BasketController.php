<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Order;
use App\OrderProduct;
use App\orderUser;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function totalPrice()
    {
        $products = session()->get('basket_products');

        $totalPrice = 0;
        foreach ($products as $key => $product) {

            $basketProduct = Product::find($product["id"]);
            $products[$key]['price'] = (int)$basketProduct->price;
            $products[$key]['new_price'] = $basketProduct->new_price;
            $products[$key]['fullPrice'] = (int)($basketProduct->price * $products[$key]['count']);
            $totalPrice += $products[$key]['fullPrice'];

        }

        return $totalPrice;
    }

    public function index()
    {
        $totalPrice = $this->totalPrice();

        return view('order', compact('totalPrice'));
    }

    public function store(StoreRequest $request)
    {
        $basketProducts = $request->session()->get('basket_products', []);

        // Валидация данных из формы
        $data = $request->all();

        // Создание нового пользователя или поиск существующего по email
        $user = OrderUser::updateOrCreate(['email' => $data['email']], [
            'name' => $data['name'],
            'phone' => $data['phone'],
        ]);

        // Создание нового заказа и сохранение его в базе данных
        $order = new Order();
        $order->order_user_id = $user->id;
        $order->total_price = 0; // Инициализация общей стоимости заказа
        $order->status = '1';
        $order->save();

        // Сохранение товаров в заказ
        foreach ($basketProducts as $basketProduct) {
            $product = Product::find($basketProduct['id']);
            $fullPrice = $product->price * $basketProduct['count']; // Вычисляем полную стоимость товара
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $product->id;
            $orderProduct->count = $basketProduct['count'];
            $orderProduct->price = $product->price;
            $orderProduct->fullprice = $fullPrice; // Сохраняем полную стоимость товара в заказе
            $orderProduct->name = $product->name;
            $orderProduct->image = $product->image;
            $orderProduct->save();

            // Обновляем общую стоимость заказа после сохранения каждого товара
            $order->total_price += $fullPrice;
            $order->save();
        }

        // Очистка данных о заказе в сессии
        $request->session()->forget('basket_products');

        // Перенаправление пользователя на страницу подтверждения заказа
        return redirect()->route('main.index');
    }

    public function show()
    {
        return view('orderShow');
    }

    // функция вывода товаров с корзины

    public function basket()
    {
        // достаем товары с сесии
        $products = session()->get('basket_products', []);

        //устанвливаем начальную общую цену, поскольку мы не знаем есть ли у нас товары вообще то устанавливаем начальную цену 0
        $totalPrice = 0;

        //Перебираем все товары с помощью форича, устанавливаем переменную для ключа в элементах $key и переменную для элементов $product
        foreach ($products as $key => $product) {
            //Находим продукт по айди товара с сессии
            $basketProduct = Product::find($product["id"]);

            //заполняем массив продукта для отображения пользователю с корзине
            $products[$key]['name'] = $basketProduct->name;
            $products[$key]['price'] = (int)$basketProduct->price;
            $products[$key]['description'] = $basketProduct->description;
            $products[$key]['new_price'] = $basketProduct->new_price;
            $products[$key]['image'] = $basketProduct->image;
            $products[$key]['category_id'] = $basketProduct->category_id;

            //не нужнаая строчка
            $products[$key]['fullPrice'] = (int)($basketProduct->price * $products[$key]['count']);

            // добавляем к общей сумме цену за товар умноженое на количество товаров которые хочет купить пользователь
            $totalPrice += $products[$key]['fullPrice'];

        }

        return view('basket', compact('products', 'totalPrice'));
    }

    public function basketAddd(Request $request, $productId)
    {
        if (session()->has('basket_products')) {
            //достаем массив с товарами с сессии
            $products = session()->get('basket_products');
            //перебираем товар с сессии
            $isProductExist = false;
            foreach ($products as $key => $product) {
                //чекаем нет ли у нас в корзине товара который мы хотим добавить, если он есть то добавляем к количеству плюс 1, если нет то добавляем как новый товар с количеством 1
                if ($product['id'] == $productId) {
                    $products[$key]['count']++;
                    $isProductExist = true;
                }
            }
            if (!$isProductExist) {
                $products[] = [
                    'id' => $productId,
                    'count' => 1,
                ];
            }
            // сохраняем новый массив в сессию
            session()->put('basket_products', $products);
        } else {
            // создаем новый товар
            $products[] = [
                'id' => $productId,
                'count' => 1,
            ];

            //сохраняем массив в сессию
            session()->put('basket_products', $products);
        }
        //        session()->flash('success', 'Продукт добавлен в корзину');
        //
        //        return redirect()->route('basket.index', compact('products'));
        $totalProducts = count(session()->get('basket_products'));
        return response()->json(['total_products' => $totalProducts, 'message' => 'Продукт добавлен в корзину']);

    }

    public function basketRemove(Request $request, $productId)
    {
        // достаем продукты с корзины
        $products = session()->get('basket_products');

        //перебираем все товары
        foreach ($products as $key => $product) {
            // если есть совпадение по айди, то делаем минус 1, если после этого товаров стало 0 или меньше 0 то полностью очищаем массив от этого товара, если чего сохраняем в сессию
            if ($product['id'] == $productId) {
                $products[$key]['count']--;

                if ($products[$key]['count'] <= 0) {
                    unset($products[$key]);
                }
            }
        }

        session()->put('basket_products', $products);

        //        session()->flash('danger', 'Продукт удален из корзины');
        //
        //        return redirect()->route('basket.index', compact('products'));
        $totalProducts = count(session()->get('basket_products'));

        return response()->json(['total_products' => $totalProducts, 'message' => 'Продукт удален из корзины']);
    }

    public function basketRemoveAll(Request $request, $productId)
    {
        // достаем продукты с корзины
        $products = session()->get('basket_products');

        //перебираем все товары
        foreach ($products as $key => $product) {
            // если есть совпадение по айди, то удаляем все товары с этим айди
            if ($product['id'] == $productId) {
                unset($products[$key]);
            }
        }

        session()->put('basket_products', $products);

        $totalProducts = count(session()->get('basket_products'));

        return response()->json(['total_products' => $totalProducts, 'message' => 'Продукт удален из корзины']);
    }


    public function basketJson()
    {
        // достаем товары с сесии
        $products = session()->get('basket_products');

        //устанвливаем начальную общую цену, поскольку мы не знаем есть ли у нас товары вообще то устанавливаем начальную цену 0
        $totalPrice = 0;

        //Перебираем все товары с помощью форича, устанавливаем переменную для ключа в элементах $key и переменную для элементов $product
        foreach ($products as $key => $product) {
            //Находим продукт по айди товара с сессии
            $basketProduct = Product::find($product["id"]);

            //заполняем массив продукта для отображения пользователю с корзине
            $products[$key]['name'] = $basketProduct->name;
            $products[$key]['price'] = (int)$basketProduct->price;
            $products[$key]['description'] = $basketProduct->description;
            $products[$key]['new_price'] = $basketProduct->new_price;
            $products[$key]['image'] = $basketProduct->image;
            $products[$key]['category_id'] = $basketProduct->category_id;

            //не нужнаая строчка
            $products[$key]['fullPrice'] = (int)($basketProduct->price * $products[$key]['count']);

            // добавляем к общей сумме цену за товар умноженое на количество товаров которые хочет купить пользователь
            $totalPrice += $products[$key]['fullPrice'];
        }

        return response()->json(['products' => $products, 'total_price' => $totalPrice]);
    }

}
