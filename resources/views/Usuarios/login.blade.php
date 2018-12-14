@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h3>Autenticação<h3>
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
      <form method="post" action="{{ route('usuarios.login') }}">
          <div class="form-group">
              @csrf
              <label for="login">Login do Usuário:</label>
              <input type="text" class="form-control" name="no_usuario"/>
          </div>
          <div class="form-group">
              <label for="senha">Senha:</label>
              <input type="password" class="form-control" name="senha"/>
          </div>
          <button type="submit" class="btn btn-primary">Logar</button>
          <button type="reset" class="btn btn-primary">Limpar</button>
      </form>
  </div>
</div>
@endsection
