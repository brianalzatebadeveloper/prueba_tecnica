<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Laracasts\Flash\Flash;
use Carbon\Carbon;

class ContactsController extends Controller
{

    public function __construct()
    {

        Carbon::setlocale('es');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $records = Contact::SearchEmail($request->emails)->SearchCity($request->citys)->SearchSection($request->sections)->orderBy('created_at','DESC')->paginate(10);

        $records->each(function($records){
              $records->Plan;
        });

        if(!empty($request->emails) || !empty($request->citys) || !empty($request->sections))
        {
            $records->withPath('contacts?emails='.$request->emails.'&citys='.$request->citys.'&sections='.$request->sections);
        }

        $section = 'all';

        if(!empty($request->sections))
        {
            $section = $request->sections;
        }

        $emails = Contact::orderBy('email','ASC')->pluck('email','email');
        $citys = Contact::orderBy('city','ASC')->pluck('city','city');
        $sections = Contact::orderBy('section','ASC')->pluck('section','section');


        return view('admin.contacts.index')->with('records',$records)->with('emails',$emails)->with('citys',$citys)->with('sections',$sections)->with('section',$section);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);

        $contact->each(function($contact){
            $contact->Plan;
        });

        return view('admin.contacts.show')->with('contact',$contact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);

        if($contact->delete())
        {
            Flash('El contacto ha sido eliminado correctamente...')->success();
        }
        else
        {
            Flash('El contacto no pudo ser eliminado, por favor intente nuevamente.')->error();
        }

        return redirect()->route('contacts.index');
    }


    public function export($section){

       if($section != 'all')
       {
            $contactsRegister = Contact::SearchSection($section)->orderBy('created_at','DESC');
       }
       else
       {
            $contactsRegister = Contact::orderBy('created_at','DESC');
       }

       $records = $contactsRegister->get();


       header('Content-Type: text/csv; charset=utf-8');
       header('Content-Disposition: attachment; filename=contactos.csv');

       $output = fopen('php://output', 'w');

        foreach ($records as $key => $record){
          $arrOutput = [
               $record->name,
               $record->email,
               $record->phone,
               $record->city,
               $record->message,
               $record->section,
               $record->url,
               $record->url2,
               $record->plan_id,
               $record->created_at
         ];

         fputcsv($output, $arrOutput);
        }

        exit;

    }

    /**
     * method validate refresh contacts.
     *
     * @return \Illuminate\Http\Response
     */
     public function statusContact(Request $request)
     {
         if($request->ajax())
         {
             $contact = Contact::find($request->id);

             if($contact->status == 1)
             {
                 $status = 2;
             }
             else
             {
                 $contact->status = 1;

                 if($contact->save())
                 {
                    $status = 1;

                 }
                 else
                 {
                   $status = 0;
                 }
             }

             return response(json_encode(['ok'=>$status]));


         }
     }

     /**
      * method validate refresh contacts.
      *
      * @return \Illuminate\Http\Response
      */
     public function validateRefresh(Request $request)
     {
         if($request->ajax())
         {
           $queryContacts = Contact::where('notification',0)->get();
           $cont = $queryContacts->count();
           $result = '';
           $status = '';


           $contacts = [];

           if(!empty($queryContacts) && !empty($queryContacts->toArray()))
           {

               if($cont > 1)
               {
                   foreach($queryContacts as $key => $item){
                       $contacts[$key] = $item->name;
                   }

                   foreach($queryContacts as $key => $item){

                     $result = Contact::find($item->id);
                     $result->notification = 1;

                     $result->save();

                   }

                   $status = 1;

               }
               else
               {

                 $contacts[] = $queryContacts[0]['name'];

                 $result = Contact::find($queryContacts[0]['id']);
                 $result->notification = 1;
                 $result->save();

                 $status = 1;

               }

           }
           else
           {
               $status = 2;
           }

           return response(json_encode(['ok'=>$status,'contacts' => $contacts,'cont' => $cont]));
         }
     }

     /**
      * method refresh contacts.
      *
      * @return \Illuminate\Http\Response
      */
     public function refreshContact(Request $request)
     {
         if($request->ajax())
         {
             $contact = Contact::where('status',0)->orderBy('created_at','DESC')->get();

             $view = view('admin.contacts.refresh')->with('contact', $contact)->render();

             return response($view);

         }
     }


}
