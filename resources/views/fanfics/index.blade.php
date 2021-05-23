@extends('layouts.layout')
<link href="{{ asset('css/fanfics.css') }}" rel="stylesheet">
@section('cabecalho')
    gerenciador de fanfics ou outras histórias que você lê
@endsection

@section('conteudo')


    <div class="col-md-8 mt-auto mb-auto">
        <div class="btn-group nova">
            <a href="{{ route('form_criar_fanfic') }}" class="btn btn-custom rounded" id="btn-adicionar">+ fanfic</a>
        </div>

        <div id="lista-fanfics">
        <h4>fanfics adicionadas</h4>
        <ul class="list-group">
            @foreach($fanfics as $fanfic)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="nome-fanfic" id="nome-fanfic-{{ $fanfic->id }}">{{ $fanfic->nome }}</span>

                    <div class="input-group w-50" hidden id="input-nome-fanfic-{{ $fanfic->id }}">
                        <input type="text" class="form-control" value="{{ $fanfic->nome }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary btn-sm" onclick="editarFanfic({{ $fanfic->id }})">
                                <i class="fas fa-pen"></i>
                            </button>
                            @csrf
                        </div>
                    </div>

                    <span class="d-flex">
                        <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $fanfic->id }})" id="btn-editar">
                            <i class="fas fa-edit"></i>
                        </button>
                        <a href="/fanfics/{{ $fanfic->id }}/livros" class="btn btn-info btn-sm mr-1" id="link-externo">
                           <i class="far fa-eye"></i>
                        </a>
                        <form method="post" action="/fanfics/{{ $fanfic->id }}"
                              onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($fanfic->nome) }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" id="btn-deletar">
                                <i class="fas fa-eraser"></i>
                            </button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
        </div>
    </div>


    <script>
        function toggleInput(fanficId) {
            const nomeFanficElem = document.getElementById(`nome-fanfic-${fanficId}`);
            const inputFanficElem = document.getElementById(`input-nome-fanfic-${fanficId}`);
            if (nomeFanficElem.hasAttribute('hidden')) {
                nomeFanficElem.removeAttribute('hidden');
                inputFanficElem.hidden = true;
            } else {
                inputFanficElem.removeAttribute('hidden');
                nomeFanficElem.hidden = true;
            }
        }

        function editarFanfic(fanficId) {
            let formData = new FormData();
            const nome = document
                .querySelector(`#input-nome-fanfic-${fanficId} > input`)
                .value;
            const token = document
                .querySelector(`input[name="_token"]`)
                .value;
            formData.append('nome', nome);
            formData.append('_token', token);
            const url = `/fanfics/${fanficId}/editaNome`;
            fetch(url, {
                method: 'POST',
                body: formData
            }).then(() => {
                toggleInput(fanficId);
                document.getElementById(`nome-fanfic-${fanficId}`).textContent = nome;
            });
        }
    </script>
@endsection
