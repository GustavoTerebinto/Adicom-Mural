@auth
    <!-- <li class="dropdown-item"><a href="{{ route('ideas') }}" class="nav-link @if (Route::is('ideas'))  @endif">Ideias</a></li> -->
    <li class="dropdown-item"><a href="{{ route('pautas') }}" class="nav-link @if (Route::is('pautas'))  @endif">Pautas</a></li>
    <!-- <li class="dropdown-item"><a href="{{ route('feedbacks') }}" class="nav-link @if (Route::is('feedbacks')) active @endif">Feedbacks</a></li> -->
    <li class="dropdown-item"><a href="{{ route('order.list') }}"class="nav-link @if (Route::is('order.list')) active @endif">Acompanhar serviços</a></li>
    <li class="dropdown-item"><a href="{{ route('services') }}" class="nav-link @if (Route::is(['services', 'order.create'])) active @endif">Solicitar serviço</a></li>

    <li><hr class="dropdown-divider d-xl-none"></li>

    <li class="dropdown-item d-flex d-xl-none justify-content-between">
        <div tabindex="0" class="avatar ml-2">
            <div class="rounded-full w-10 h-10 m-1">
                <img src="img/relation.png" />
            </div>
        </div> 
        <div class="text-right mt-1">
            <p class="font-semibold text-white">{{ auth()->user()->first_name }}</p>
            <p class="text-xs font-extralight -mt-1 text-black">{{ auth()->user()->username }}</p>
        </div>
    </li>

    <li class="dropdown-item d-xl-none"><a href="{{ route('logout') }}">Sair</a></li>
    <li class="dropdown-item d-xl-none"><a href="{{ route('home') }}" class="pl-0 nav-link @if (Route::is('home')) active @endif" >Inicial</a></li>


    <li class="dropdown ml-8 mr-2 flex flex-row d-none d-xl-flex">
        <div class="text-right mt-1">
            <p class="font-semibold text-white">{{ auth()->user()->first_name }}</p>
            <p class="text-xs font-extralight -mt-1 text-black">{{ auth()->user()->username }}</p>
        </div>
        <div tabindex="0" class="avatar ml-2">
            <div class="rounded-full w-12 h-12 m-1">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier"> 
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 9C8.25 6.92893 
                        9.92893 5.25 12 5.25C14.0711 5.25 15.75 6.92893 15.75 9C15.75 11.0711 
                        14.0711 12.75 12 12.75C9.92893 12.75 8.25 11.0711 8.25 9ZM12 6.75C10.7574 
                        6.75 9.75 7.75736 9.75 9C9.75 10.2426 10.7574 11.25 12 11.25C13.2426 11.25 
                        14.25 10.2426 14.25 9C14.25 7.75736 13.2426 6.75 12 6.75Z" fill="#ffffff">
                        </path> 
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.25 12C1.25 6.06294 
                        6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 
                        17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12 2.75C6.89137 
                        2.75 2.75 6.89137 2.75 12C2.75 14.5456 3.77827 16.851 5.4421 18.5235C5.6225 
                        17.5504 5.97694 16.6329 6.68837 15.8951C7.75252 14.7915 9.45416 14.25 
                        12 14.25C14.5457 14.25 16.2474 14.7915 17.3115 15.8951C18.023 16.6329 
                        18.3774 17.5505 18.5578 18.5236C20.2217 16.8511 21.25 14.5456 21.25 12C21.25 
                        6.89137 17.1086 2.75 12 2.75ZM17.1937 19.6554C17.0918 18.4435 16.8286 17.5553 
                        16.2318 16.9363C15.5823 16.2628 14.3789 15.75 12 15.75C9.62099 15.75 8.41761 
                        16.2628 7.76815 16.9363C7.17127 17.5553 6.90811 18.4434 6.80622 19.6553C8.28684 
                        20.6618 10.0747 21.25 12 21.25C13.9252 21.25 15.7131 20.6618 17.1937 19.6554Z" 
                        fill="#ffffff"></path> 
                    </g>
                </svg>
            </div>
        </div>  
        <ul class="shadow menu dropdown-content bg-base-100 rounded-box w-52">
            <li><a href="{{ route('logout') }}">Sair</a></li>
            <li><a href="{{ route('home') }}" class="nav-link @if (Route::is('home')) active @endif" >Inicial</a></li>
        </ul>
    </li>
@endauth

@guest
    <!-- <li class="dropdown-item"><a href="{{ route('ideas') }}" class="nav-link @if (Route::is('ideas'))  @endif">Ideias</a></li> -->
    <li class="dropdown-item"><a href="{{ route('faq') }}" class="nav-link @if (Route::is('faq'))  @endif">FAQ</a></li>
    <li class="dropdown-item"><a href="{{ route('services') }}" class="nav-link @if (Route::is(['services', 'order.create'])) active @endif">Solicitar serviço</a></li>
    <li class="dropdown-item"><a href="{{ route('login') }}" class="nav-link getstarted">Entrar <i class="bi bi-box-arrow-in-right"></i></a></li>
@endguest