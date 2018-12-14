@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h3>Cadastrar Usuário<h3>
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
      <form method="post" action="{{ route('usuarios.store') }}">
          <div class="form-group">
              @csrf
              <label for="login">Login do Usuário:</label>
              <input type="text" class="form-control" name="no_usuario"/>
          </div>
          <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="senha">Senha:</label>
              <input type="password" class="form-control" name="senha"/>
          </div>
          <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
  </div>
</div>
@endsection
