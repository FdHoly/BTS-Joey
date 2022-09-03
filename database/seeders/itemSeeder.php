<?php

namespace Database\Seeders;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $field = [
            [
                'itemName' => 'Item1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_checklist' => '1'
            ]
        ];
        foreach ($field as $Xample) {
            Item::create($Xample);
        }
    }
}
