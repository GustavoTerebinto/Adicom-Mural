<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container">
        <header class="section-header">
            <h2>Serviços</h2>
            <p>Como podemos ajudar</p>
        </header>

        <div class="row gy-4">
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-6" data-aos-delay="200">
                <div class="flex flex-col border-b-2 border-{{ $category->color }} shadow-xl drop-shadow-md m-2 p-3 w-full hover:shadow-2xl">
                    <div class="text-{{ $category->color }} w-24 self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            {!! $category->icon_svg_path !!}
                        </svg>
                    </div>
                    <div class="mt-1 p-1 text-center" style="min-height: 14rem">
                        <h3 class="text-{{ $category->color }} text-center w-full font-semibold text-2xl mb-3">{!! $category->name !!}</h3>
                        <p class="text-md">{!! Str::markdown($category->description ? $category->description : '') !!}</p>
                    </div>
                    <div class="p-2 text-center">
                        <a href="{{ route('services') }}#{{ $category->slug }}" class="text-{{ $category->color }} font-semibold">
                            <span>Acessar</span> <i class="bi bi-box-arrow-in-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- ======= Pauta Section ======= -->
            <div class="col-lg-4 col-md-6" data-aos-delay="200">
                <div class="flex flex-col border-b-2 border-green-500 shadow-xl drop-shadow-md m-2 p-3 w-full hover:shadow-2xl">
                    <div class="text-green-500 w-24 self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M17 3.33782C15.5291 2.48697 13.8214 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22C17.5228 22 22 17.5228 22 12C22 10.1786 21.513 8.47087 20.6622 7" stroke="#444" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                        </svg>
                    </div>
                    <div class="mt-1 p-1 text-center" style="min-height: 14rem">
                        <h3 class="text-green-500 text-center w-full font-semibold text-2xl mb-3">Sugestão de Pauta</h3>
                        <p class="text-md">Sugestão de pautas institucionais para produção de material jornalístico</p>
                    </div>
                    <div class="p-2 text-center">
                        <a href="{{ route('pautas') }}" class="text-green-500 font-semibold">
                            <span>Acessar</span> <i class="bi bi-box-arrow-in-right"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
