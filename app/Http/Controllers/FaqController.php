<?php

namespace App\Http\Controllers;

class FaqController extends Controller
{
    /**
     * Show the faq page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('faq');
    }
}