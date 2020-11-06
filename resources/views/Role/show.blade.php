@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Ver Rol</h2></div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{ route('role.update', $role->id) }}" method="POST">
                     @csrf
                     @method('PUT')
                        <div class="container">

                              <div class="form-group">
                              <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" 
                              value="{{ old('name', $role->name)}}" readonly>
                               
                              </div>

                              <div class="form-group">
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" 
                                value="{{ old('slug', $role->slug)}}" readonly>
                               
                              </div>

                              <div class="form-group">
                                 <textarea class="form-control" id="description" name="description" rows="3"  placeholder="Descripcion" readonly>{{ old('description', $role->description)}}</textarea>
                              </div>

                              <hr>

                              <h3>Full Acceso</h3>

                             <div class="custom-control custom-radio custom-control-inline">
                                <input disabled type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes"
                                @if ( $role['full-access']=="yes")
                                    checked
                                @elseif (old('full-access')=="yes")
                                    checked
                                @endif
                                >
                                <label class="custom-control-label" for="fullaccessyes">Si</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input disabled type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no" 
                                @if ( $role['full-access']=="no")
                                    checked
                                @elseif (old('full-access')=="no")
                                    checked
                                @endif
                                
                                >
                                <label class="custom-control-label" for="fullaccessno">No</label>
                              </div>

                              <hr>

                              <h3>Listado de Permisos</h3>

                              @foreach ($permissions as $permission)
                                  
                                <div class="custom-control custom-checkbox">
                                    <input disabled type="checkbox" class="custom-control-input" id="permission_{{$permission->id}}"
                                    value="{{$permission->id}}" name="permission[]"
                                    
                                    @if ( is_array(old('permission')) && in_array("$permission->id", old('permission'))  )
                                        checked

                                    @elseif ( is_array($permission_role) && in_array("$permission->id", $permission_role)  )
                                        checked
                                    @endif
                                    
                                    >
                                    <label class="custom-control-label" for="permission_{{$permission->id}}">
                                            {{$permission->id}} - {{$permission->name}} <em>({{$permission->description}})</em>
                                    </label>
                                </div>
                              
                              @endforeach

                              <hr>

                           
                            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-info">Editar</a>
                            <a href="{{ route('role.index') }}" class="btn btn-danger">Volver</a>

                        </div>




                    </form>
                    



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
