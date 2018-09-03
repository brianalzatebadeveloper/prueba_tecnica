@extends('layouts.admin')

@section('title','servicios')

@section('content')

<div class="">
    <div class="page-title">

                <div class="pull-left">
                    <h3>Servicios</h3>
                </div>

                <div class="pull-right"><a href="{{ route('services.create') }}" class="btn btn-app"><i class="fa fa-plus"></i> Nuevo</a></div>



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
                                        <th>Ordenar</th>
                                        <th>Nombre</th>
                                        <th>Destacar</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="sortable">

                                 @foreach($records as $key => $item)

                                       <tr id="{{ $item->id }}">
                                        <td><a href="#"><i class="fa fa-arrows"></i></a></td>
                                         <td>{!! substr(strip_tags($item->name), 0, 90).'...' !!}</td>
	                                    <td>
	                                       @if($item->featured == 1)
	                                        <a href="{{ route('services.featured',$item->id) }}" title="Quitar de destacados"><i class="fa fa-check fa-2x"></i></a>
	                                       @else
	                                       <a href="{{ route('services.featured',$item->id) }}" title="Destacar este elemento"><i class="fa fa-times fa-2x"></i></a>
	                                       @endif
	                                    </td>
                                        <td>
                                        <a href="{{ route('services.edit',$item->id) }}" title="Editar este elemento"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="{{ route('services.destroy',$item->id) }}" onclick =" return confirm('Desea eliminar el servicio? '+'{{ $item->name }}');"><i class="fa fa-trash fa-2x"></i></a>
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

{!! Form::open(['route' => 'services.updateorder', 'method' => 'POST', 'id' => 'formUpdate']) !!}
{!! Form::close() !!}

@endsection

@section('customJs')

<script>

  var baseRoot = "{{ route('services.updateorder') }}";
  var _token = $("input[name='_token']").val();



  $(function() {
    $( "#sortable" ).sortable({
       update : function (event , ui){

        updateOrder(ui.item.index());
       }
    });
    $( "#sortable" ).disableSelection();
  });

  function updateOrder(order){

	   var dataIds = $("#sortable").sortable("toArray");

	   $.ajax({
	     url: baseRoot,
	     type: 'POST',
	     dataType: 'json',
	     async : false,
	     data: {_token:_token, data_images : dataIds , order : order},
	     beforeSend: function(){

	      $("#sortable").css('opacity','0.6');
	     },
	     success: function(response){
         console.log(response.ok);
	       $("#sortable").css('opacity','1');
	     },
	     error:function(){
	      $("#sortable").css('opacity','1');
	     }
	   });

	}

</script>

@endsection