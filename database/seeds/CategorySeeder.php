<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'id' => '1',
            'name' => 'Artes e Campanhas',
            'slug' => 'artescamp',
            'description' => 'Produção de artes visuais e campanhas de divulgação.',            
            'icon_svg_path' => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 15.0002H5C5.63383 15.0002 5.95074 15.0002 6.23374 15.1215C6.51673 15.2428 6.73529 15.4723 7.17241 15.9313L8.31402 17.13C8.69807 17.5332 8.8901 17.7348 9.12399 17.7191C9.35788 17.7035 9.52124 17.478 9.84796 17.027L13.4781 12.0163C13.8177 11.5476 13.9875 11.3132 14.2282 11.3022C14.4688 11.2911 14.6594 11.5089 15.0405 11.9445L16.8179 13.9758C17.2591 14.48 17.4797 14.7321 17.7751 14.8662C18.0705 15.0002 18.4056 15.0002 19.0756 15.0002H22" stroke="#444" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8" stroke="#444" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>',
            'color' => 'green-500',
        ]);
        
        Category::create([
            'id' => '2',
            'name' => 'Impressão',
            'slug' => 'impressao',
            'description' => 'Impressão de materiais de divulgação em folhas A4 e A3 (impressão interna) ou banners em lona (impressão externa)',            
            'icon_svg_path' => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#444" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#444" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#444"></circle> <path d="M15 16.5H9" stroke="#444" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#444" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#444" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#444" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>',
            'color' => 'green-500',
        ]);

        Category::create([
            'id' => '3',
            'name' => 'Materiais de Distribuição',
            'slug' => 'materiais',
            'description' => 'Solicitação de materiais para distribuição em ações de divulgação institucional',            
            'icon_svg_path' => '<svg viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.048"></g><g id="SVGRepo_iconCarrier"> <path d="M6 15.8L7.14286 17L10 14" stroke="#444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 8.8L7.14286 10L10 7" stroke="#444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13 9L18 9" stroke="#444" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 16L18 16" stroke="#444" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8" stroke="#444" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>',
            'color' => 'green-500',
        ]);

    }
}
