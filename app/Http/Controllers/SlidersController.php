<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Laracasts\Flash\Flash;
use App\Http\Requests\SliderRequest;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Slider::orderBy('position_order','ASC')->get();

        return view('admin.sliders.index')->with('records',$records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $slider = new Slider($request->all());

        $slider->image = '';
        $slider->image_responsive = '';
        $slider->position_order = 0;

        if($slider->save())
        {

            if(!empty($request->file('image')))
            {
                $file = $request->file('image');
                $name = 'IMG-SLD-1-'.$slider->id.'.'.$file->getClientOriginalExtension();
                $path = public_path() . '/img/slider/';
                $file->move($path,$name);

                $slider->image = $name;
            }

            if(!empty($request->file('image_responsive')))
            {
                $file = $request->file('image_responsive');
                $name = 'IMG-SLD-RS-'.$slider->id.'.'.$file->getClientOriginalExtension();
                $path = public_path() . '/img/slider/';
                $file->move($path,$name);

                $slider->image_responsive = $name;
            }

            $slider->save();

            Flash('El slider se ha guardado correctamente...')->success();

            return redirect()->route('sliders.index');

        }

        else

        {

            Flash('El slider no pudo ser guardado correctamente...')->error();

            return redirect()->route('sliders.create');
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
        $slider = Slider::find($id);

        return view('admin.sliders.edit')->with('slider',$slider);
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
        $slider = Slider::find($id);
        $slider->fill($request->all());
        $slider->url = $request->url;

        if($slider->save())
        {

            if(!empty($request->file('image')))
            {
                $file = $request->file('image');
                $name = 'IMG-SLD-1-'.$slider->id.'.'.$file->getClientOriginalExtension();
                $path = public_path() . '/img/slider/';
                $file->move($path,$name);

                $slider->image = $name;
            }

            if(!empty($request->file('image_responsive')))
            {
                $file = $request->file('image_responsive');
                $name = 'IMG-SLD-RS-'.$slider->id.'.'.$file->getClientOriginalExtension();
                $path = public_path() . '/img/slider/';
                $file->move($path,$name);

                $slider->image_responsive = $name;
            }

            $slider->save();

            Flash('El slider se ha guardado correctamente...')->success();

            return redirect()->route('sliders.index');

        }

        else

        {

            Flash('El slider no pudo ser guardado correctamente...')->error();

            return redirect()->route('sliders.create');
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

        $slider = Slider::find($id);
        $sliderImage = $slider->image;
        $sliderImage2 = $slider->image_2;

        if($slider->delete())
        {

            if(!empty($sliderImage))
            {

                $name = $sliderImage;
                $path = public_path() . '/img/slider/';
                $file = $path.$name;

                if(file_exists($file)){
                   unlink($file);
                }


            }

            if(!empty($sliderImage2))
            {

                $name = $sliderImage2;
                $path = public_path() . '/img/slider/';
                $file = $path.$name;

                if(file_exists($file)){
                    unlink($file);
                }
            }

            Flash('El slider se ha eliminado correctamente...')->success();
        }
        else
        {
            Flash('El slilder no pudo ser eliminado, por favor intente nuevamente.')->error();
        }

        return redirect()->route('sliders.index');

    }


    public function updateOrder(Request $request){


        if($request->ajax()){

            $data = $request->data_images;
            $updateDefault = $request->order;

            foreach($data as $key => $item){

                $sliderItem = Slider::find($item);

                $sliderItem->position_order = $key + 1;

                $sliderItem->save();

            }

            return response(json_encode(['ok' => 'ok']));

        }
    }
}
