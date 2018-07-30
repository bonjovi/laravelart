<?php

use App\Style;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        Style::insert([
            ['name' => 'Живопись', 'slug' => 'painting', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Графика', 'slug' => ' graphics', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Импрессионизм', 'slug' => 'impressionism', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Абстракционизм', 'slug' => 'abstractionism', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
