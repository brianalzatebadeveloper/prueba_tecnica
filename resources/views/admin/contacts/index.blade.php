@extends('layouts.admin')

@section('title','Contactos web')

@section('content')

<div class="">
            <div class="page-title">

                <div class="pull-left">
                    <h3>Contactos por sitio web</h3>
                </div>

                <div class="pull-right">
                <a href="{{ route('contacts.export',$section) }}" class="btn btn-app" onclick=" return confirm('¿Se descargarán todos los archivos en una hoja excel con extensión .csv, ¿Desea continuar?');"><i class="fa fa-download"></i> Exportar</a>
                </div>

              <div class="col-lg-12">
              {!! Form::open(['route' => 'contacts.index', 'method' => 'GET']) !!}

                <div class="col-xs-12 col-lg-3" style="margin-bottom:.5em;">

                	 {!! Form::select('emails', $emails, null, ['class' => 'form-control', 'placeholder' => '-- Email --']) !!}

                </div>
                <div class="col-xs-12 col-lg-3" style="margin-bottom:.5em;">

            		 {!! Form::select('citys', $citys, null, ['class' => 'form-control', 'placeholder' => '-- Ciudad --']) !!}

                </div>

                <div class="col-xs-12 col-lg-3" style="margin-bottom:.5em;">

                	{!! Form::select('sections', $sections, null, ['class' => 'form-control', 'placeholder' => '-- Sección --']) !!}

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
                                            <th>Teléfono</th>
                                            <th>Ciudad</th>
                                            <th>Mensaje</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                     @foreach($records as $key => $item)

                                           <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->city }}</td>

                                            <td> {{ substr(strip_tags($item->message), 0, 90).'...'}} </td>

                                           <td>
                                            <a href="{{ route('contacts.show',$item->id) }}"><i class="fa fa-eye fa-2x"></i></a>
                                            <a href="{{ route('contacts.destroy',$item->id) }}" onclick=" return confirm('Deseas eliminar el contacto? '+ '{{ $item->name }}');"><i class="fa fa-times fa-2x"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach

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