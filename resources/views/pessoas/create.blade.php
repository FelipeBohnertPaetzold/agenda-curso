@extends('template.template')

@section('content')

    <div class="col-md-12 criterio">
        <div class="col-md-8">
            <h3>Novo contato</h3>
        </div>
    </div>

    <div class="col-md-6 well separa-top">
        <form action="/pessoas/criar" method="POST">
            {{csrf_field()}}
            <div class="form-group col-md-12 {{$errors->has('nome') ? 'has-error' : ''}}">
                <label class="control-label" for="nome">Nome</label>
                <input type="text" id="nome" name="nome" value="{{old('nome')}}" placeholder="Nome do contato" class="form-control">
                @if ($errors->has('nome'))
                    <span class="help-block">
                        {{ $errors->first('nome') }}
                    </span>
                @endif
            </div>
            <div class="form-group col-md-3 {{$errors->has('ddd') ? 'has-error' : ''}}">
                <label class="control-label" for="ddd">DDD</label>
                <input type="text" id="ddd" name="ddd" value="{{old('ddd')}}" class="form-control" placeholder="(xx)">
                @if ($errors->has('ddd'))
                    <span class="help-block">
                        {{ $errors->first('ddd') }}
                    </span>
                @endif
            </div>
            <div class="form-group col-md-9 {{$errors->has('fone') ? 'has-error' : ''}}">
                <label class="control-label" for="fone">Fone</label>
                <input type="text" id="fone" name="fone" value="{{old('fone')}}" class="form-control msk-celular" placeholder="Telefone">
                @if ($errors->has('fone'))
                    <span class="help-block">
                        {{ $errors->first('fone') }}
                    </span>
                @endif
            </div>
            <div class=" col-md-12">
                <button type="submit" class="btn btn-primary acoes"><i class="glyphicon glyphicon-floppy-disk">
                    </i> Salvar
                </button>
            </div>
        </form>

    </div>

@endsection