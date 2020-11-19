@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuarios</div>

                <div class="card-body">
                  
                  <br><br>

                  @include('custom.message')
                  
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Rol(s)</th>
                            
                            <th colspan="3">Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name }}</td>
                                <td>{{$user->email }}</td>
                                <td>
                                @isset( $user->roles[0]->name )
                                  {{$user->roles[0]->name }}
                                @endisset  
                                  
                                
                                </td>
                                
                                <td> 
                                  @can('view', [$user, ['user.show','usermy.show']])
                                  <a class="btn btn-info" href="{{ route('user.show', $user->id) }}">Ver </a> 
                                 @endcan
                                </td>
                                <td> 
                                  @can('view', [$user, ['user.edit','usermy.edit']])
                                  <a class="btn btn-success" href="{{ route('user.edit', $user->id) }}">Editar </a> 
                                  @endcan
                                </td>
                                <td> 
                                  @can('haveaccess', 'user.destroy')
                                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger">
                                    Eliminar</button>
                                </form>  
                                  
                                @endcan
                                
                                </td>
                                
                            </tr>    
                            @endforeach
                            
                          
                        
                        </tbody>
                      </table>

                      {{ $users->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
