<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Content;
use Laracasts\Flash\Flash;

class ContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $section = Section::SearchSection($id)->first();
        $records = $section->Contents()->get();


        return view('admin.contents.index')->with('records',$records);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::find($id);
        $section_id = $content->section_id;

        return view('admin.contents.edit')->with('content',$content)->with('section_id',$section_id);
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

        $content = Content::find($id);
        $content->fill($request->all());

        if(!empty($request->file('image')))
        {
           $file = $request->file('image');
           $name = 'IMG-CONT-1-'.$content->section_id.'-'.$id.'.'.$file->getClientOriginalExtension();
           $path = public_path() . "/img/content/";
           $file->move($path,$name);

           $content->image = $name;

        }

        if(!empty($request->file('image_2')))
        {
           $file = $request->file('image_2');
           $name = 'IMG-CONT-2-'.$content->section_id.'-'.$id.'.'.$file->getClientOriginalExtension();
           $path = public_path() . "/img/content/";
           $file->move($path,$name);

           $content->image_2 = $name;

        }

        if(!empty($request->file('image_3')))
        {
           $file = $request->file('image_3');
           $name = 'IMG-CONT-3-'.$content->section_id.'-'.$id.'.'.$file->getClientOriginalExtension();
           $path = public_path() . "/img/content/";
           $file->move($path,$name);

           $content->image_3 = $name;

        }

        if(!empty($request->file('image_4')))
        {
           $file = $request->file('image_4');
           $name = 'IMG-CONT-4-'.$content->section_id.'-'.$id.'.'.$file->getClientOriginalExtension();
           $path = public_path() . "/img/content/";
           $file->move($path,$name);

           $content->image_4 = $name;

        }


        if($content->save())
        {
            Flash('El contenido se ha modificado correctamente...')->success();
            return redirect()->route('contents.index',$content->section_id);
        }
        else
        {
            Flash('El contenido no pudo ser modificado, por favor intente nuevamente.')->error();
            return redirect()->route('contents.edit',$id);
        }


    }


}
