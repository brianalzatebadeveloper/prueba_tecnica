@extends('layouts.admin')

@section('title','Miembros')

@section('content')

<div class="">
            <div class="page-title">
              
                <div class="pull-left">
                    <h3>Miembros</h3>
                </div>
                
                <div class="pull-right">
                	<a href="{{ route('customers.create') }}" class="btn btn-app"><i class="fa fa-plus"></i> Agregar</a>
               </div>

              
              <div class="col-lg-12">
              	{!! Form::open(['route' => 'customers.index', 'method' => 'GET']) !!}
               

                <div class="col-xs-12 col-lg-3" style="margin-bottom:.5em;">

                	 {!! Form::select('emails', $emails, null, ['class' => 'form-control','placeholder' => '-- Email --']) !!}
                
                </div>
                <div class="col-xs-12 col-lg-3" style="margin-bottom:.5em;">

                	{!! Form::select('citys', $citys, null, ['class' => 'form-control','placeholder' => '-- Ciudad --']) !!}
                 
                </div>


                <div class="col-xs-12 col-lg-3">
                  <button class="btn btn-success">Filtrar</button>
                </div>

                {!! Form::close() !!}
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
                                            <th>Email</th>
                                            <th>Tipo Documento</th>
                                            <th>Número de Identidad</th>
                                            <th>Teléfono</th>
                                            <th>Ciudad</th>
                                            <th>Tipo de usuario</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                     <?php foreach($records as $key => $item): ?>
                                       
                                           <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name.'  '.$item->lastname }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                            <?php

                                            	switch($item->tipo_doc)
                                            	{
                                            		case 'cc':
                                            			echo "Cédula de Ciudadanía";
                                            		    break;
                                            		case 'ti':
                                            			echo "Tarjeta de Identidad";
                                            			break;
                                            		case 'rc':
                                            			echo "Registro Civil";
                                            			break;
                                            		case 'cex':
                                            			echo "Cédula Extranjera";
                                            			break;
                                            		default:
                                            			echo "Documento no identificado";
                                            			break;
                                            	} 
                                            ?>
	                                           
                                            </td>

                                            <td>{{ $item->number_doc }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->city }}</td>
                                            <td>
	                                            @if($item->type_member==1)
	                                            	{{ 'Miembro(a)' }} 
	                                            @elseif($item->type_member==2)
	                                            	{{ 'Usuario(a)' }} 
	                                            @endif
                                            </td>
                                                                                     
                                           <td>

                                           <a href="{{ route('customers.edit',$item->id) }}"><i class="fa fa-edit fa-2x" title="Editar"></i></a>
                                           <a href="{{ route('customers.destroy',$item->id) }}" title="Eliminar" onclick =" return confirm('Desea eliminar el usuario? '+'{{ $item->name.' '.$item->lastname }}');"><i class="fa fa-trash-o fa-2x"></i></a>
                                          
                                             
                                            </td>
                                        </tr>
                                     <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                                <div class="col-md-8 col-md-offset-2 text-center">

                                   {!! $records->links() !!}

                                </div>
                            </div>
                        </div>
                   </div>



                  </div>
                </div>
              </div>
            </div>
          </div>  

@endsection
