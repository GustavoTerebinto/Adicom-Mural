<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PautaController extends Controller
{
    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pautas');
    }
}
