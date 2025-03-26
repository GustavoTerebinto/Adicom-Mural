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
                <h1 data-aos="fade-up">Perguntas frequentes (FAQ)</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Local para fazer perguntas e sanar dúvidas.</h2>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <header class="section-header">
            <h2>Compartilhe seus pensamentos</h2>
            <p>Qual é a sua dúvida?</p>
        </header>

        <div class="row">
            @livewire('crud.main', [
                'model' => 'App\Models\Faq',
                'show_list' => false,
                'include_create' => [
                    'user_id' => auth()->id()
                ]
            ])
        </div>
    </div>
    @endsection