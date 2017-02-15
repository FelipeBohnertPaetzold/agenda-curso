@extends('template.template')

@section('content')
    <div class="row">
        <div class="btn-group col-md-12 btn-group-justified" role="group" aria-label="...">
            @foreach(range('A', 'Z') as $letra)
                <div class="btn-group" role="group" aria-label="...">
                    <a class="btn  btn-primary @if($letra == $criterio) disabled @endif"
                       href="/{{$letra}}">{{$letra}}</a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-md-12 separa-top criterio">
        <div class="col-md-8">
            <h3>Critério de busca: {{$criterio}}</h3>
        </div>
        <div class="col-md-4 separa-top">
            <form class="float-right" action="/buscar" method="POST">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" name="criterio" class="form-control" placeholder="Buscar por">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Busca!</button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    @if($pessoas->count() > 0)
        <div class="well col-md-12 separa-top">
            @foreach($pessoas as $pessoa)
                <div class="col-md-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                {{$pessoa->nome}}
                                <div class="acoes">
                                    <a title="Novo telefone" href="telefone/novo"><i class="glyphicon glyphicon-plus add-fone"></i> </a>
                                    <a title="Editar contato" href="#">
                                        <i class="glyphicon glyphicon-pencil editar"></i>
                                    </a>
                                    <a title="Remover contato" href="/pessoas/delete/{{$pessoa->id}}">
                                        <i class="glyphicon glyphicon-trash excluir"></i>
                                    </a>
                                </div>
                            </h3>

                        </div>
                        <div class="panel-body">
                            @foreach($pessoa->telefones as $telefone)
                                <div class="telefone">
                                    <i class="glyphicon glyphicon-phone"></i>
                                    ({{$telefone->ddd}}) {{$telefone->fone}}
                                    <div class="acoes">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                        <a href="#">
                                            <i class="glyphicon glyphicon-trash excluir"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection