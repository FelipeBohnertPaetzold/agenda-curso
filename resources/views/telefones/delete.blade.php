@extends('template.template')

@section('content')

    <div class="col-md-12 criterio">
        <div class="col-md-8">
            <h3>Excluir telefone</h3>
        </div>
    </div>

    <div class="col-md-12 well separa-top">
        <div class="col-md-8">
            <h3>Confirma exclusão?</h3>
        </div>

        <div class="col-md-4 acoes">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{$telefone->pessoa->nome}}
                    </h3>

                </div>
                <div class="panel-body">
                    @foreach($telefone->pessoa->telefones as $fone)
                        <div class="telefone @if($fone->id == $telefone->id) delete-fone @endif">
                            <i class="glyphicon glyphicon-phone"></i>
                            ({{$telefone->ddd}}) {{$telefone->fone}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <a href="/" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i> Cancela</a>
            <a href="/telefones/remove/{{$telefone->pessoa->id}}" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Confirma</a>
        </div>
    </div>
@endsection