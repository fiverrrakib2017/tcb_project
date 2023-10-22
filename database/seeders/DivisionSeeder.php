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
                'name'=>'ঢাকা',
             ],
             [
                'name'=>'চট্টগ্রাম',
             ],
             [
                'name'=>'রাজশাহী',
             ],
             [
                'name'=>'খুলনা',
             ],
             [
                'name'=>'সিলেট',
             ],
             [
                'name'=>'বরিশাল ',
             ],
             [
                'name'=>'রংপুর ',
             ],
             [
                'name'=>'ময়মনসিংহ ',
             ],
        ];

        foreach ($data  as $data) {
            Division::create($data);
        }
    }
}
