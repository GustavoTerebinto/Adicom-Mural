@extends('layouts.base')
@section('content')

<section>
    <div class="container mt-10">
        <header class="section-header mt-10">
            <h2>Chamados</h2>
            <p>Procurar pedidos</p>
        </header>

        @livewire('admin.orders')
    </div>
</section>
@endsection