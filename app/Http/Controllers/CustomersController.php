<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Laracasts\Flash\Flash;
use App\Http\Requests\MemberRequest;


class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $tipoDoc = [
            'cc'=>'Cédula de Ciudadanía',
            'ti'=>'Tarjeta de Identidad',
            'rc'=>'Registro Civil',
            'cex'=>'Cédula Extrajera'
    ];

    public $tipoCustomer = [
            1=>'Miembro(a)',
            2=>'Usuario(a)'
    ];

    public function index(Request $request)
    {
        $records = Member::SearchEmail($request->emails)->SearchCity($request->citys)->orderBy('id','DESC')->paginate(10);

        if(!empty($request->emails) || !empty($request->citys))
        {
            $records->withPath('?emails='.$request->emails.'&citys='.$request->citys);
        }

        $emails = Member::orderBy('email','ASC')->pluck('email','email');
        $citys = Member::orderBy('city','ASC')->pluck('city','city');

        return view('admin.customers.index',compact('records','emails','citys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create')->with('tipoDoc',$this->tipoDoc)->with('tipoCustomer',$this->tipoCustomer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {

        $member = new Member($request->all());

        $member->name = $request->name;
        $member->lastname = $request->lastname;
        $member->email = $request->email;
        $member->tipo_doc = $request->tipo_doc;
        $member->number_doc = $request->number_doc;
        $member->phone = $request->phone;
        $member->city = strtolower($request->city);
        $member->address = $request->address;
        $member->password = bcrypt($request->password);
        $member->role = 2;
        $member->type_member = $request->type_member;
        $member->status = 1;

       if($member->save())
       {
            Flash('El Miembro ha sido creado correctamente...')->success();
            return redirect()->route('customers.index');
       }
       else
       {
            Flash('Ha ocurrido un error al intentar crear el miembro, por favor intente nuevamente')->error();
            return redirect()->route('customers.create');
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
        $member = Member::find($id);

        return view('admin.customers.edit')->with('member',$member)->with('tipoDoc',$this->tipoDoc)->with('tipoCustomer',$this->tipoCustomer);
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
        $member = Member::find($id);
        $password = $member->password;

        $member->name = $request->name;
        $member->lastname = $request->lastname;
        $member->email = $request->email;
        $member->tipo_doc = $request->tipo_doc;
        $member->number_doc = $request->number_doc;
        $member->phone = $request->phone;
        $member->city = strtolower($request->city);
        $member->address = $request->address;
        $member->role = 2;
        $member->type_member = $request->type_member;
        $member->status = 1;

        if(empty($request->password))
        {
            $member->password = $password;
        }
        else
        {
            $member->password = bcrypt($request->password);
        }

       if($member->save())
       {
            Flash('El Miembro se ha modificado correctamente...')->success();
            return redirect()->route('customers.index');
       }
       else
       {
            Flash('El Miembro no pudo ser modificado, por favor intente nuevamente')->error();
            return redirect()->route('customers.edit',$id);
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
        $member = Member::find($id);


        if($member->delete())
        {
            Flash('El Miembro ha sido eliminado correctamente...')->success();
            return redirect()->route('customers.index');
        }
        else
        {
            Flash('El Miembro no pudo ser eliminado, por favor intente nuevamente')->error();
            return redirect()->route('customers.index');
        }
    }
}
