@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Adicionar cliente
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('clientes.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Nome do cliente:</label>
              <input type="text" class="form-control" name="no_cliente"/>
          </div>
          <div class="form-group">
              <label for="price">CPF:</label>
              <input type="text" class="form-control" name="cpf"/>
          </div>
          <div class="form-group">
              <label for="quantity">RG:</label>
              <input type="text" class="form-control" name="rg"/>
          </div>
          <div class="form-group">
              <label for="quantity">Data de Nascimento:</label>
              <input type="text" class="form-control" name="data_nascimento"/>
          </div>
          <div class="form-group">
              <label for="quantity">Telefone:</label>
              <input type="text" class="form-control" name="telefone"/>
          </div>
          <div class="form-group">
              <label for="quantity">Local de Nascimento:</label>
              <input type="text" class="form-control" name="local_nascimento"/>
          </div>
          <button type="submit" class="btn btn-primary">Adicionar</button>
      </form>
  </div>
</div>
@endsection
