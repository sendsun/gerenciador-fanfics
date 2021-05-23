@extends('layouts.layout')
<link href="{{ asset('css/fanfics.css') }}" rel="stylesheet">
@section('cabecalho')
    Adicionar Fanfic
@endsection

@section('conteudo')

    <div id="form-adicionar">
        <form method="post">
            @csrf
            <div class="row">

                <div class="col col-8">
                    <label for="nome">nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" required>
                </div>

                <div class="col col-2">
                    <label for="qtdlivros">livros</label>
                    <input type="number" class="form-control" name="qtdlivros" id="qtdlivros" required>
                </div>

                <div class="col col-2">
                    <label for="qtdcap">capítulos</label>
                    <input type="number" class="form-control" name="qtdcap" id="qtdcap" required>
                </div>
            </div>

            <button class="btn btn-custom rounded" id="btn-add">Adicionar</button>
        </form>
    </div>
@endsection
