@extends('template.template')

@section('content')
    <div class="col-md-12 criterio">
        <div class="col-md-8">
            <h3>Novo Telefone</h3>
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
            <form action="/telefones/criar" method="POST">
                {{csrf_field()}}
                <input type="hidden" value="{{$pessoa->id}}" name="pessoa_id">
                <div class="form-group col-md-3 {{$errors->has('ddd') ? 'has-error': ''}}">
                    <label class="control-label" for="ddd">DDD</label>
                    <input type="text" id="ddd" name="ddd" value="{{old("ddd")}}" class="form-control" placeholder="(xx)">
                    @if ($errors->has('ddd'))
                        <span class="help-block">
                            {{ $errors->first('ddd') }}
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-9 {{$errors->has('fone') ? 'has-error': ''}}">
                    <label class="control-label" for="fone">Fone</label>
                    <input type="text" id="fone" name="fone" class="form-control msk-celular" value="{{old("fone")}}" placeholder="Telefone">
                    @if ($errors->has('fone'))
                        <span class="help-block">
                            {{ $errors->first('fone') }}
                        </span>
                    @endif
                </div>
                <div class=" col-md-12">
                    <button type="submit" class="btn btn-primary acoes editar"><i class="glyphicon glyphicon-floppy-disk">
                        </i> Salvar
                    </button>
                    <a href="/" class="btn btn-default acoes"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection