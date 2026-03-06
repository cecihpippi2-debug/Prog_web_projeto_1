<?php

namespace Database\Seeders;

use App\Models\CategoriaAluno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlunoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriaAluno::factory()->count(3)->create();
    }
}
