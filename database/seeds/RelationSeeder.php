<?php

use App\Models\Relation;
use Illuminate\Database\Seeder;

class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Relation::create(['name' => 'Professor']);
        Relation::create(['name' => 'Aluno']);
        Relation::create(['name' => 'Técnico']);
        Relation::create(['name' => 'Servidor']);
    }
}
