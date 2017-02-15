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
            <div class="form-group col-md-12">
                <label class="control-label" for="nome">Nome</label>
                <input required type="text" id="nome" name="nome" placeholder="Nome do contato" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label class="control-label" for="ddd">DDD</label>
                <input type="text" id="ddd" name="ddd" class="form-control" placeholder="(xx)">
            </div>
            <div class="form-group col-md-9">
                <label class="control-label" for="fone">Fone</label>
                <input type="text" id="fone" name="fone" class="form-control" placeholder="Telefone">
            </div>
            <div class=" col-md-12">
                <button type="submit" class="btn btn-primary acoes"><i class="glyphicon glyphicon-floppy-disk">
                    </i> Salvar
                </button>
            </div>
        </form>

    </div>

@endsection