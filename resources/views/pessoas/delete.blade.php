@extends('template.template')

@section('content')

    <div class="col-md-12 criterio">
        <div class="col-md-8">
            <h3>Excluir contato</h3>
        </div>
    </div>

    <div class="col-md-12 well separa-top">
        <div class="col-md-8">
            <h3>Confirma exclusão?</h3>
        </div>

        <div class="col-md-4 acoes">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{$pessoa->nome}}
                    </h3>

                </div>
                <div class="panel-body">
                    @foreach($pessoa->telefones as $telefone)
                        <div class="telefone">
                            <i class="glyphicon glyphicon-phone"></i>
                            ({{$telefone->ddd}}) {{$telefone->fone}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <a href="/" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i> Cancela</a>
            <a href="/pessoas/remove/{{$pessoa->id}}" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Confirma</a>
        </div>
    </div>
@endsection