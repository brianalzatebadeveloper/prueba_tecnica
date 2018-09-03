<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seo;
use Laracasts\Flash\Flash;
use App\Http\Requests\SeoRequest;

class SeosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Seo::orderBy('id','ASC')->get();

        return view('admin.seos.index')->with('records',$records);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seo = Seo::find($id);

        return  view('admin.seos.edit')->with('seo',$seo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeoRequest $request, $id)
    {
        $seo = Seo::find($id);
        $seo->fill($request->all());

        if($seo->save())
        {
            Flash('El seo de la sección ' .$seo->section.' ha sido modificado correctamente...')->success();
            return redirect()->route('seos.index');
        }
        else
        {
            Flash('El seo de la sección que ha seleccionado no pudo ser modificado, por favor intente nuevamente.')->error();
            return redirect()->route('seos.edit',$id);
        }
    }


}
