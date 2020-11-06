@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Ver Usuario</h2></div>
 
                <div class="card-body">
                    @include('custom.message')

                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                     @csrf
                     @method('PUT')
                        <div class="container">

                              
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" 
                                value="{{ old('name', $user->name)}}" readonly>
                                 
                                </div>
  
                                <div class="form-group">
                                  <input type="text" class="form-control" name="email" id="email" placeholder="Correo" 
                                  value="{{ old('email', $user->email)}}" readonly>
                                 
                                </div>
  
                                <div class="form-group">
                                    <select class="form-control" name="roles" id="roles" disabled>
                                        @foreach ($roles as $role)
                                    <option value="{{ $role->id}}"
                                      @isset($user->roles[0]->name)
                                          @if ($role->name ==  $user->roles[0]->name)
                                              selected
                                          @endif
                                      @endisset
                                      
                                      
                                      > {{$role->name}} </option>
                                         @endforeach
                                    </select>
                                </div>
  
                                <hr>

                           
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info">Editar</a>
                            <a href="{{ route('user.index') }}" class="btn btn-danger">Volver</a>

                        </div>




                    </form>
                    



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
