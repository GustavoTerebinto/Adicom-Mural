@extends('layouts.base')
@section('content')

<!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Atendimento DICOM</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Uma ponte entre você e a construção de uma universidade melhor</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="{{ route('services') }}" class="btn-get-started d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Solicitar serviço</span>
                  <i class="bi bi-arrow-right-circle"></i>
              </a>
              <a href="{{ route('faq') }}" class="btn-get-outline d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Pauta</span>
                  <i class="bi bi-chat-quote-fill"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('assets/img/hero.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section =======
    <section id="about" class="about">

      <div class="container">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos-delay="200">
            <div class="content">
              <h3 class="mb-3">Boas-vindas!</h3>
              <h2>Central de solicitação de serviços do PRACTICE e um local de discussão de ideias</h2>
              <p>
                Essa é a plataforma oficial do programa, onde a comunidade acadêmica pode solicitar e acompanhar serviços. Além disso, você pode dar sugestões de melhorias e ideias, fazendo parte do crescimento do programa e inovação da <a href="https://www.uffs.edu.br/"><strong>UFFS</strong></a>.
              </p>
              <div class="text-center text-lg-start">
                <a href="https://practice.uffs.cc" class="btn btn-primary d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Conheça o PRACTICE</span>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('img/hero/estudio-practice.jpg') }}" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section>
    ======= End About Section ======= -->
    
    <!-- include('components.valores') -->
    <!-- include('components.contador') -->
    @include('components.servicos')
    <!-- include('components.testemunho') -->
  </main><!-- End #main -->
@endsection
