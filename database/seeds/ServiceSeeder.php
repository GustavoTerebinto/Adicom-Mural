<?php

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            #'img_url' => '',
            'name' => 'Flyer',
            'description' => 'Um pequeno folheto impresso para divulgação, com conteúdo mais sucinto e direto.',
            'work_days' => 7,
            'eval_days' => 7,
            'category_id' => 1,
            'is_available' => true,
            'icon_svg_path' => '',
            'color' => 'green-400',
        ]);

        Service::create([
            #'img_url' => '',
            'name' => 'Cartaz',
            'description' => 'Material maior para divulgar algo ou alguém, escrito de forma mais elaborada.',
            'work_days' => 7,
            'eval_days' => 7,
            'category_id' => 1,
            'is_available' => true,
            'icon_svg_path' => '',
            'color' => 'green-400',
        ]);

        Service::create([
            #'img_url' => '',
            'name' => 'Banner',
            'description' => 'Um material de divulgação mais amplo ainda, que permite uma série maior de informações',
            'work_days' => 7,
            'eval_days' => 7,
            'category_id' => 1,
            'is_available' => true,
            'icon_svg_path' => '',
            'color' => 'green-400',
        ]);

        Service::create([
            #'img_url' => '',
            'name' => 'Peças para redes digitais',
            'description' => '*Adicionar descrição',
            'work_days' => 7,
            'eval_days' => 7,
            'category_id' => 1,
            'is_available' => true,
            'icon_svg_path' => '',
            'color' => 'green-400',
        ]);

        Service::create([
            #'img_url' => '',
            'name' => 'Outros',
            'description' => 'Espaço para escrever mais...',
            'work_days' => 7,
            'eval_days' => 7,
            'category_id' => 1,
            'is_available' => false,
            'icon_svg_path' => '',
            'color' => 'green-400',
        ]);

        Service::create([
            #'img_url' => '',
            'name' => 'Impressão interna - A3',
            'description' => 'Impressão em folha A3',
            'work_days' => 7,
            'eval_days' => 7,
            'category_id' => 2,
            'is_available' => false,
            'icon_svg_path' => '',
            'color' => 'green-400',
        ]);

        Service::create([
            #'img_url' => '',
            'name' => 'Impressão interna - A4',
            'description' => 'Impressão em folha A4',
            'work_days' => 7,
            'eval_days' => 7,
            'category_id' => 2,
            'is_available' => false,
            'icon_svg_path' => '',
            'color' => 'green-400',
        ]);

        Service::create([
            #'img_url' => '',
            'name' => 'Impressão externa - Lona',
            'description' => '*Adicionar descrição',
            'work_days' => 7,
            'eval_days' => 7,
            'category_id' => 2,
            'is_available' => false,
            'icon_svg_path' => '',
            'color' => 'green-400',
        ]);
    }
}
