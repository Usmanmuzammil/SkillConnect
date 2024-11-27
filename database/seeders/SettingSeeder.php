<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'key'=>"name",
            'value'=>'Govt: Degree College & PG Center',
        ]);
        Setting::create([
            'key'=>"brand_logo",
            'value'=>'/webisteassets/img/GDC-Logo.png',
        ]);
        Setting::create([
            'key'=>"brand_logo_white",
            'value'=>'/webisteassets/img/GDC-Logo.png',
        ]);
        Setting::create([
            'key'=>"address",
            'value'=>'Street No. 11, Unit # 11 Latifabad Sindh 71500',
        ]);
        Setting::create([
            'key'=>"email",
            'value'=>'gdc&pgcenter.gmail.com',
        ]);
        Setting::create([
            'key'=>"cell_number",
            'value'=>'125345345454',
        ]);
    }

    }
