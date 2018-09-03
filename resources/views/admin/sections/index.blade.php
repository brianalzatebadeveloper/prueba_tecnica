@extends('layouts.admin')

@section('title', 'Secciones')

@section('content')

      <div class="">
            <div class="page-title">
              
                <div class="pull-left">
                    <h3>Secciones</h3>
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
                                                <th>Contenidos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                   		@foreach($records as $item)
                                               <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                <a href="{{ route('contents.index',$item->id) }}"><i class="fa fa-edit fa-2x"></i></a>
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