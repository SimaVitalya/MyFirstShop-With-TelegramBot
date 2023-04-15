<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoductSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 13; $i++) {
            DB::table('products')->insert([
                'name' => 'Продукт ' . $i,
                'description' => 'iPhone (МФА: [ˈaɪfoʊn]; «Айфо́н») — серия смартфонов, разработанных корпорацией Apple. Работают под управлением операционной системы iOS, представляющей собой упрощённую и оптимизированную для функционирования на мобильном устройстве версию macOS.',
                'price' => rand(200, 1500),
                'image' => 'product_' . $i . '.jpg',
                'category_id' => 1,
            ]);


        }
    }
}
