@extends('layouts.admin')

@section('title', 'Seo')

@section('content')

<div class="">
            <div class="page-title">
              
                <div class="pull-left">
                    <h3>SEO</h3>
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
                                        <th>Sección</th>
                                        <th>Meta Title</th>
                                        <th>Meta Description</th>
                                        <th>Meta Keywords</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php foreach($records as $item): ?>
                                       <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->section }}</td>
                                        <td>
                                       		{{ substr(strip_tags($item->meta_title), 0, 90).'...' }}
                                       	</td>
                                         <td>
                                        	{{ substr(strip_tags($item->meta_description), 0, 90).'...' }}
                                        </td>
                                        <td>
                                        	{{ substr(strip_tags($item->meta_keywords), 0, 90).'...' }}
                                        </td>
                                        <td>
                                        <a href="{{ route('seos.edit',$item->id) }}"><i class="fa fa-edit fa-2x"></i></a>
                                        
                                       
                                         
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