<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Product::create([
            'name' => 'Вечерний морской бриз',
            'slug' => 'vecherniy-morskoy-briz',
            'painter' => 'Сарычев Александр Васильевич',
            'material' => 'Картон, масло',
            'dimensions' => '35 х 25,5 см',
            'year' => '1948г.',
            'country' => 'Советский союз',
            'price' => 246890,
            'description' => ''
        ])->styles()->attach(1);

        Product::create([
            'name' => 'Летняя деревня',
            'slug' => 'letnyaya-derevnya',
            'painter' => 'Егоров Андрей Афанасьевич',
            'material' => 'Картон, темпера, гуашь',
            'dimensions' => '35 х 25,5 см',
            'year' => '1925г.',
            'country' => 'Советский союз',
            'price' => 65000,
            'description' => ''
        ])->styles()->attach(2);

        Product::create([
            'name' => 'У берега',
            'slug' => 'u-berega',
            'painter' => 'Сысоев Николай Александрович',
            'material' => 'Холст, масло',
            'dimensions' => '35 х 25,5 см',
            'year' => '1948г.',
            'country' => 'Советский союз',
            'price' => 35000,
            'description' => ''
        ])->styles()->attach(3);

        Product::create([
            'name' => 'Утренний рассвет',
            'slug' => 'utrenniy-rassvet',
            'painter' => 'Сарычев Александр Васильевич',
            'material' => 'Картон, масло',
            'dimensions' => '35 х 25,5 см',
            'year' => '1948г.',
            'country' => 'Советский союз',
            'price' => 90000,
            'description' => 'Картон, масло 35 х 25,5 см 1948г.'
        ])->styles()->attach(4);

        Product::create([
            'name' => 'Морской шторм',
            'slug' => 'morskoy-shtorm',
            'painter' => 'Егоров Андрей Афанасьевич',
            'material' => 'Картон, темпера, гуашь',
            'dimensions' => '35 х 25,5 см',
            'year' => '1925г.',
            'country' => 'Советский союз',
            'price' => 15000,
            'description' => 'Картон, темпера , гуашь 35 х 25,5 см 1925г.'
        ])->styles()->attach(1);

        Product::create([
            'name' => 'Кувшинки в пруду',
            'slug' => 'kuvshinky-v-prudu',
            'painter' => 'Сысоев Николай Александрович',
            'material' => 'Холст, масло',
            'dimensions' => '35 х 25,5 см',
            'year' => '1948г.',
            'country' => 'Советский союз',
            'price' => 325000,
            'description' => 'Холст, масло 35 х 25,5 см 1948г'
        ])->styles()->attach(2);
    }
}
