@extends('layouts.layout')
<link href="{{ asset('css/livros.css') }}" rel="stylesheet">
@section('cabecalho')
    Livros de {{ $fanfic->nome }}
@endsection

@section('conteudo')
    <ul class="list-group" id="lista-livro">
        @foreach($livros as $livro)
            <li class="list-group-item" id="item-livro">
                <a href="/livros/{{ $livro->id }}/capitulos">
                    livro {{ $livro->numero }}
                </a>
                <span id="caps-lidos">
                {{ $livro->getCapitulosLidos()->count() }} / {{ $livro->capitulos->count() }}
                </span>
            </li>
        @endforeach
    </ul>
@endsection
