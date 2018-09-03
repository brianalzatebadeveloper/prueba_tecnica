@extends('layouts.admin')

@section('title','Administradores')

@section('content')

<div class="">
            <div class="page-title">
              
                <div class="pull-left">
                    <h3>Administrador</h3>
                </div>
                        
				<div class="pull-right">
                	<a href="{{ route('users.create') }}" class="btn btn-app"><i class="fa fa-plus"></i> Agregar</a>
               </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <div class="row">
                       <div  class="">
                          <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Rol</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php foreach($records as $item): ?>
                                       <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ ($item->role==1 ? 'Administrador':'') }}</td>
                                        <td>
                                        <a href="{{ route('users.edit',$item->id) }}"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="{{ route('users.destroy',$item->id) }}" onclick=" return confirm('Desea eliminar el administrador? '+ '{{ $item->name }}')"><i class="fa fa-trash fa-2x"></i></a>
                                       
                                       
                                         
                                        </td>
                                    </tr>
                                 <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection