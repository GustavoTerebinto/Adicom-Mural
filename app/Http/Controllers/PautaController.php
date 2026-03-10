<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PautaController extends Controller
{
    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pautas = auth()->user()->pautas()->get();

        return view('pautas', [
            'pautas' => $pautas
        ]);
    }
}
