<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'name_eng'=>'Dhaka',
                'name_ban'=>'ঢাকা',
             ],
             [
               'name_eng'=>'Chattogram',
                'name_ban'=>'চট্টগ্রাম',
             ],
             [
               'name_eng'=>'Rajshahi',
                'name_ban'=>'রাজশাহী',
             ],
             [
               'name_eng'=>'Khulna',
                'name_ban'=>'খুলনা',
             ],
             [
               'name_eng'=>'Dhaka',
                'name_ban'=>'সিলেট',
             ],
             [
               'name_eng'=>'Barishal',
                'name_ban'=>'বরিশাল ',
             ],
             [
               'name_eng'=>'Rangpur',
                'name_ban'=>'রংপুর ',
             ],
             [
               'name_eng'=>'Mymensingh ',
                'name_ban'=>'ময়মনসিংহ ',
             ],
        ];

        foreach ($data  as $data) {
            Division::create($data);
        }
    }
}
