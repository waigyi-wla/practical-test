<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();    
        
        DB::table('form_settings')->insert([
            [
                'name' => 'Text',
                'type' => 'text',
            ],
            [
                'name' => 'Number',
                'type' => 'number',
            ],
            [
                'name' => 'Date',
                'type' => 'date',
            ]
        ]);

    }
}
