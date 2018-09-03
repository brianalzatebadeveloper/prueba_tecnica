@extends('layouts.admin')

@section('title','Contenidos')

@section('content')

<div class="">
            <div class="page-title">
              
                <div class="pull-left">
                    <h3>Contenidos</h3>
                </div>
                
                <div class="pull-right"> <a href="{{ route('sections.index') }}" class=" btn btn-app"> <i class="fa fa-repeat"></i> Volver a secciones</a></div>

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
                                            <th>Contenido</th>
                                            <th>Texto</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($records as $item)
                                           <tr>
                                            <td>{{ $item->id }}  </td>
                                            <td>{{ $item->name }} </td>
                                            <td>
                                            {{ substr(strip_tags($item->text), 0, 90).'...'}} 
                                            </td>
                                            <td>
                                                <a href="{{ route('contents.edit',$item->id) }}"><i class="fa fa-edit fa-2x"></i></a>                   
                                            </td>
                                        </tr>
                                    @endforeach
                                        
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