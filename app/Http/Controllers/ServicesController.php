<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracast\Flash\Flash;
use App\Service;
use App\Http\Requests\ServiceRequest;


class ServicesController extends Controller
{

     public $maxFeatured = 3;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Service::orderBy('position_order','ASC')->paginate(20);
        return view('admin.services.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service = new Service($request->all());
        $service->image = '';
        $service->icon = $request->icon;

        if($service->save())
        {
            if(!empty($request->file('image')))
            {
                $file = $request->file('image');
                $name = 'IMG-SER-1-'.$service->id.'.'.$file->getClientOriginalExtension();
                $path = public_path() . '/img/service/';
                $file->move($path,$name);

                $service->image = $name;
            }

            $service->featured = 0;
            $service->position_order = 0;

            $service->save();

            Flash('El servicio ha sido creado correctamente...')->success();
            return redirect()->route('services.index');
        }
        else
        {
            Flash('El servicio no pudo ser creado, por favor intente nuevamente')->error();
            return redirect()->route('services.create');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);

        return view('admin.services.edit')->with('service',$service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $service->fill($request->all());
        $service->icon = $request->icon;

        if($service->save())
        {
            if(!empty($request->file('image')))
            {
                $file = $request->file('image');
                $name = 'IMG-SER-1-'.$service->id.'.'.$file->getClientOriginalExtension();
                $path = public_path(). '/img/service/';
                $file->move($path,$name);

                $service->image = $name;
            }

            $service->save();

            Flash('El servicio ha sido modificado correctamente...')->success();
            return redirect()->route('services.index');
        }
        else
        {
            Flash('El servicio no pudo ser modificado, por favor intente nuevamente.')->error();
            return redirect()->route('services.edit',$id);

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $imageService = $service->image;

        if($service->delete())
        {
            if(!empty($imageService))
            {
                $name = $imageService;
                $path = public_path().'/img/service/';
                $file = $path.$name;

                if(file_exists($file))
                {
                    unlink($file);
                }
            }

            Flash('El servicio ha sido eliminado correctamente...')->success();

        }
        else
        {
            Flash('El servicio no pudo eliminarse, por favor intente nuevamete')->error();
        }


        return redirect()->route('services.index');
    }


    public function updateOrder(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->data_images;
            $updateDefault = $request->order;

            foreach($data as $key => $item){

                $serviceItem = Service::find($item);
                $serviceItem->position_order = $key + 1;

                $serviceItem->save();
            }

            return Response(json_encode(['ok' => 'ok']));
        }
    }


    public function featured($id)
    {
        $featured = 0;
        $service = Service::find($id);
        $item = $service;
        $type = '';


        if($item->featured == 1)
        {
            $message = 'El elemento ha dejado de estar destacado';
            $featured = 0;
            $type = 'success';
        }
        else
        {
            $queryTwo = Service::where('featured',1)->get();
            $items = $queryTwo->count();

            if($items < $this->maxFeatured)
            {
                $message = 'Elemento destacado exitosamente';
                $featured = 1;
                $type = 'success';
            }
            else
            {
                $message = 'Máximo '.$this->maxFeatured.' elementos destacados';
                $type = 'error';
            }
        }

        $item->featured = $featured;

        if($item->save())
        {
            if($type == 'success')
            Flash($message)->success();
            else
            Flash($message)->error();
        }
        else
        {
          Flash('Error al intentar destacar el elemento')->error();
        }


        return redirect()->route('services.index');

    }
}
