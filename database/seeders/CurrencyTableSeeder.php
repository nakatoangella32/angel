<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * "name", "code", "active"]
     * @return void
     */
    public function run()
    {
        $data = ["name" => "Uganda Shilling", "code"=>'UGX'];
        Currency::create($data);
    }
}
