<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerenciador de Fanfics</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
</head>
<body>
@if(!empty($mensagem))
    <div class="alert alert-success">
        {{ $mensagem }}
    </div>
@endif
<nav class="navbar fixed-top navbar-light bg-light d-flex justify-content-between" id="navbar-topo">
    <a class="navbar-brand" id="pginicial-texto" href="{{ route('listar_fanfics') }}">Página Inicial</a>
    <a  id="sair-texto" href="{{ route('logout') }}">Sair</a>
</nav>
<section class="d-flex">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="row">


                    <div class="col-md-4 lado text-white">
                        <h3>@yield('cabecalho')</h3><i class="fas fa-book"></i>
                    </div>
                    @yield('conteudo')
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
