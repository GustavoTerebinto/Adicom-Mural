<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Equipe Practice',
            'email' => 'practice@uffs.edu.br',
            'password' => 'dd',
            'username' => 'practice',
            'uid' => 'practice',
            'cpf' => '000',
            'type' => User::NORMAL
        ]);

        User::create([
            'name' => 'Fernando Bevilacqua',
            'email' => 'fernando.bevilacqua@uffs.edu.br',
            'password' => 'dd',
            'username' => 'fernando.bevilacqua',
            'uid' => 'fernando.bevilacqua',
            'cpf' => '000',
            'type' => User::ADMIN
        ]);
        
        User::create([
            'name' => 'Gustavo Camineiro Terebinto',
            'email' => 'terebintogustavo@gmail.com',
            'password' => '$2y$10$K5mGNKnCCzxVd2ax6oaB8ed.WCVVhgoBWuKIf94yJMecAHSzXwJAO',
            'username' => 'gustavo.terebinto',
            'uid' => 'gustavo.terebinto',
            'cpf' => '5897801150',
            'type' => User::ADMIN
        ]);
    }
}
