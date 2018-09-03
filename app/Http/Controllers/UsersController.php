<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = User::orderBy('id','ASC')->get();

        return view('admin.users.index')->with('records',$records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $admin = new User($request->all());
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->role = 1;

        if($admin->save())
        {
            Flash('El administrador ha sido creado correctamente...')->success();
            return redirect()->route('users.index');
        }
        else
        {
            Flash('El administrador no pudo ser creado, por favor intente nuevamente.')->error();
            return redirect()->route('users.create');
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
       $admin = User::find($id);

       return view('admin.users.edit')->with('admin',$admin);
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
        $admin = User::find($id);
        $password = $admin->password;
        $admin->name = $request->name;
        $admin->email = $request->email;
        if(!empty($request->password))
        {
            $admin->password = bcrypt($request->password);
        }
        else
        {
            $admin->password = $password;
        }

        if($admin->save())
        {
            Flash('El administrador ha sido modificado correctamente...')->success();
            return redirect()->route('users.index');
        }
        else
        {
            Flash('El administrador no pudo ser modificado, por favor intente nuevamente')->error();
            return redirect()->route('users.update',$id);
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
        $admin = User::find($id);

        if($admin->delete())
        {
            Flash('El administrador se ha eliminado...')->success();
        }
        else
        {
            Flash('El administrador no pudo ser eliminado, por favor intente nuevamente')->error();
        }

        return redirect()->route('users.index');
    }
}
