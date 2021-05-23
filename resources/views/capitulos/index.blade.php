@extends('layouts.layout')
<link href="{{ asset('css/capitulos.css') }}" rel="stylesheet">
@section('cabecalho')
    Capítulos
@endsection

@section('conteudo')
    <div id="form-caps">
        <form action="/livros/{{ $livroId }}/capitulos/ler" method="post">
            @csrf
            <ul class="list-group" id="lista-caps">
                @foreach($capitulos as $capitulo)
                    <li class="list-group-item" id="item-caps">
                        capítulo {{ $capitulo->numero }}
                        <input type="checkbox"
                               name="capitulo[{{ $capitulo->id }}][lido]" id="check"
                            {{ $capitulo->lido ? 'checked' : '' }}>
                    </li>
                @endforeach
            </ul>

            <button class="btn btn-custom rounded" id="btn-salvar">Salvar</button>
        </form>
    </div>
@endsection
