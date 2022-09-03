<?php

namespace Database\Seeders;

use App\Models\Checklist;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class checklistSeeder extends Seeder
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
                'name' => 'CL1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        foreach ($field as $Xample) {
            Checklist::create($Xample);
        }
    }
}
