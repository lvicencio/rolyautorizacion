@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Roles</div>

                <div class="card-body">
                  <a href="{{ route('role.create') }}"  class="btn btn-primary float-right">Crear Nuevo Rol</a>
                  <br><br>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acceso</th>
                            <th colspan="3">Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach ($roles as $role)
                                <th scope="row">{{$role->id}}</th>
                                <td>{{$role->name }}</td>
                                <td>{{$role->slug }}</td>
                                <td>{{$role->description }}</td>
                                <td>{{$role['full-access'] }}</td>
                                <td> <a class="btn btn-info" href="{{ route('role.show', $role->id) }}">Ver </a> </td>
                                <td> <a class="btn btn-success" href="{{ route('role.edit', $role->id) }}">Editar </a> </td>
                                <td> <a class="btn btn-danger" href="{{ route('role.show', $role->id) }}">Eliminar </a> </td>
                                
                                
                            @endforeach
                            
                          </tr>
                        
                        </tbody>
                      </table>

                      {{ $roles->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
