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
                        {{$telefone->pessoa->nome}}
                    </h3>

                </div>
                <div class="panel-body">
                    @foreach($telefone->pessoa->telefones as $fone)
                        <div class="telefone @if($telefone->id == $fone->id) edit-fone @endif">
                            <i class="glyphicon glyphicon-phone"></i>
                            ({{$fone->ddd}}) {{$fone->fone}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <form action="/telefones/update" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$telefone->id}}">
                <div class="form-group col-md-3">
                    <label class="control-label" for="ddd">DDD</label>
                    <input type="text" id="ddd" value="{{$telefone->ddd}}" name="ddd" class="form-control" placeholder="(xx)">
                </div>
                <div class="form-group col-md-9">
                    <label class="control-label" for="fone">Fone</label>
                    <input type="text" id="fone" value="{{$telefone->fone}}" name="fone" class="form-control" placeholder="Telefone">
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