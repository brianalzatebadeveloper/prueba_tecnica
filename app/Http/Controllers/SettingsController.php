<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Laracasts\Flash\Flash;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();

        return view('admin.settings.index')->with('setting',$setting);
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
        $setting = Setting::find($id);

        $setting->fill($request->all());

        if($setting->save())
        {
            Flash('Se ha actualizado la configuración correctamente...')->success();
        }
        else
        {
            Flash('Ha ocurrido un error al tratar de actualizar la configuración, por favor intente nuevamente.')->error();
        }

        return redirect()->route('settings.index');
    }

}
