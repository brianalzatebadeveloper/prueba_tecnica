@extends('layouts.admin')

@section('title','Sliders')

@section('content')

<div class="">
            <div class="page-title">
              
                <div class="pull-left">
                    <h3>Sliders</h3>
                </div>
                
                <div class="pull-right"><a href="{{ route('sliders.create') }}" class="btn btn-app"><i class="fa fa-plus"></i> Nuevo</a></div>

        

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
                                              <th>Imagen</th>
                                              <th>Texto</th>
                                              <th>Acciones</th>
                                          </tr>
                                      </thead>
                                     <tbody id="sortable">
                                       @foreach($records as $item)
                                             <tr id="{{ $item->id }}">
                                              <td><a href="#"><i class="fa fa-arrows"></i></a></td>
                                              <td>
                                              <img src="{{ asset('img/slider/'.$item->image) }}" width="150" alt="">
                                              </td>
                                              <td>
                                             	{{ substr(strip_tags($item->title), 0 , 90).'...' }}
                                              </td>
                                              <td>
                                              <a href="{{ route('sliders.edit',$item->id) }}" title="Editar"><i class="fa fa-edit fa-2x"></i></a>
                                              <a href="{{ route('sliders.destroy',$item->id) }}" onclick=" return confirm('Desea eliminar el slider?' + '{{ substr(strip_tags($item->title), 0 , 10).'...' }}');"><i class="fa fa-trash fa-2x"></i></a>                                    
                                               
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


{!! Form::open(['route' => 'sliders.updateorder', 'method' => 'POST', 'id' => 'formOrder']) !!}
{!! Form::close() !!}



@endsection

@section('customJs')

<script>

	var baseRoot = "{{ route('sliders.updateorder') }}";
  var form = $('#formOrder');
  var _token = $("input[name='_token']").val();

 


  console.log(baseRoot);

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
	     data: {_token: _token, data_images : dataIds , order : order},
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