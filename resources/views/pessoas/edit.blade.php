@extends('template.template')

@section('content')
    <div class="col-md-12 criterio">
        <div class="col-md-8">
            <h3>Editar contato</h3>
        </div>
    </div>

    <div class="col-md-12 well separa-top">
        <div class="col-md-4">
            <div class="panel panel-info">
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
        <div class="col-md-8">
            <form action="/pessoas/update" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$pessoa->id}}">
                <div class="form-group col-md-12 {{$errors->has('nome') ? 'has-error' : ''}}">
                    <label class="control-label" for="nome">Nome</label>
                    <input type="text" value="{{$pessoa->nome}}" id="nome" name="nome"
                           placeholder="Nome do contato" class="form-control">
                    @if ($errors->has('nome'))
                        <span class="help-block">
                            {{ $errors->first('nome') }}
                        </span>
                    @endif
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary acoes editar"><i
                                class="glyphicon glyphicon-floppy-disk">
                        </i> Salvar
                    </button>
                    <a href="/" class="btn btn-default acoes"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection