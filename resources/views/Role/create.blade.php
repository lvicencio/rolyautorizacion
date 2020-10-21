@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Crear Nuevo Role</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('role.store') }}" method="POST">
                     @csrf
                     
                        <div class="container">

                              <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
                               
                              </div>

                              <div class="form-group">
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug">
                               
                              </div>

                              <div class="form-group">
                                 <textarea class="form-control" id="description" name="description" rows="3"  placeholder="Descripcion"></textarea>
                              </div>

                              <hr>

                              <h3>Full Acceso</h3>

                             <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes">
                                <label class="custom-control-label" for="fullaccessyes">Si</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no" checked>
                                <label class="custom-control-label" for="fullaccessno">No</label>
                              </div>

                              <hr>

                              <h3>Listado de Permisos</h3>

                              @foreach ($permissions as $permission)
                                  
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="permission_{{$permission->id}}"
                                    value="{{$permission->id}}"     name="permission[]">
                                    <label class="custom-control-label" for="permission_{{$permission->id}}">
                                            {{$permission->id}} - {{$permission->name}} <em>({{$permission->description}})</em>
                                    </label>
                                </div>
                              
                              @endforeach

                              <hr>

                              <input type="submit" value="Guardar" class="btn btn-primary">
                        </div>




                    </form>
                    


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
