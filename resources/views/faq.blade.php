@extends('layouts.base')
@section('content')

<section id="hero" class="hero hero-slim d-flex align-items-center mt-0 pt-15 mt-15 h-101 mb-10">
    <div class="container mt-15">
        <div class="row">
            <div class="col-5 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset('img/undraw.co/faq.png') }}" class="w-96 h-100 mx-auto" alt="">
            </div>
            <div class="col-7 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Perguntas frequentes (FAQ)</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Local para fazer perguntas e sanar dúvidas sobre o sistema.</h2>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <header class="section-header">
            <h2>Em desenvolvimento</h2>
            <p>Não há nada ainda no momento!</p>
        </header>

        <!-- <div class="row d-flex justify-content-center">
            <div class="feedback-form col-md-10">
                @ livewire('crud.main', [
                    'model' => 'App\Models\Idea',
                    'show_list' => false,
                    'include_create' => [
                        'user_id' => auth()->id()
                    ]
                ])
            </div>
        </div> -->
    </div>
@endsection