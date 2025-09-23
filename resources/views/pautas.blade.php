@extends('layouts.base')
@section('content')


@section('wideTopContent')
<section id="hero" class="hero hero-slim d-flex align-items-center">
    <div class="container mt-15">
        <div class="row">
            <div class="col-5 hero-img">
                <img src="{{ asset('img/undraw.co/faq.png') }}" class="w-75 h-auto mx-auto" alt="">
            </div>
            <div class="col-7 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Sugestões de Pauta</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Local para fazer sugestões para pautas.</h2>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <header class="section-header">
            <h2>Compartilhe sua sugestão</h2>
        </header>

        <div class="row">
            @livewire('crud.main', [
                'model' => 'App\Models\Pauta',
                'show_list' => false,
                'include_create' => [
                    'user_id' => auth()->id()
                ]
            ])
        </div>
    </div>
    @endsection