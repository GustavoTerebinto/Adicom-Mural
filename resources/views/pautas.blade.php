@extends('layouts.base')
@section('content')


@section('wideTopContent')
<section id="hero" class="hero hero-slim d-flex align-items-center">
    <div class="container mt-15">
        <div class="row">
            <div class="col-5 hero-img">
                <img src="{{ asset('img/undraw.co/pauta.png') }}" class="w-75 h-auto mx-auto" alt="">
            </div>
            <div class="col-7 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Sugestões de Pauta</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Sugestão de pautas institucionais para produção de material jornalístico.</h2>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <header class="section-header">
            <h2>Compartilhe ideias</h2>
            <p>Qual sua sugestão?</p>
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

        <div class="row">
            <div class="col-12">
                <table class="d-flex flex-column">
                    <thead class="d-lg-flex flex-row w-auto d-none pb-2">
                        <tr class="row w-100">
                            <th class="order-3 order-lg-2 col-12 col-lg-4 col-md-8">Título</th>
                            <th class="order-1 order-lg-3 col-12 col-lg-2 ml-5">Nome</th>
                            <th class="order-4 order-md-4 col-6 col-lg-3 col-md-8 ml-7">Data</th>
                        </tr>
                    </thead>                
                    <tbody class="d-flex flex-column mb-10">
                        @foreach ($pautas as $pauta)
                            <tr class="row py-3 border-top">
                                <td class="order-3 order-lg-2 pb-3 col-12 col-lg-4 col-md-8 text-wrap d-md-flex align-items-md-end align-items-lg-center ">
                                    {{ $pauta->title }}
                                </td>
                                <td class="order-1 order-lg-3 col-12 col-lg-2 d-flex justify-content-end justify-content-lg-start pb-1 pl-0 align-items-center">
                                    <span class="badge badge-outline badge-success badge-md">{{ $pauta->name }}</span>
                                </td>
                                <td class="order-4 order-md-4 col-6 col-lg-3 col-md-8 pt-2  d-lg-flex align-items-lg-start justify-content-lg-center flex-lg-column">
                                    <div>{{ $pauta->created_at }}</div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection