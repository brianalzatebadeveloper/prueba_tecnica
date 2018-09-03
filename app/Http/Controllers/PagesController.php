<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Content;
use App\Seo;
use App\Slider;
use App\Service;
use App\Member;
use App\Setting;
use App\Contact;
use App\Http\Requests\MemberRequest;
use Laracasts\Flash\Flash;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact as ContactEmail;
use App\Mail\Welcome;

class PagesController extends Controller
{

    /**
     * method home
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        $content = $this->setContent(1);
        $seo = $this->toolSeo(1);
        $dates = $this->setDates();

        $slider = Slider::orderBy('position_order','ASC')->get();
        $service = Service::orderBy('featured','DESC')->orderBy('position_order','ASC')->get();



        return view('pages.home',compact('content','seo','dates','slider','service'));

    }

    /**
     * method form members
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function members(MemberRequest $request)
     {
        $member =  new Member($request->all());
        $member->password = bcrypt($request->password);
        $member->type_member = 1;

        if($member->save())
        {
            Flash('El usuario ha sido creado correctamente.')->success();
        }
        else
        {
            Flash('El usuario no pudo ser creado...')->success();
        }

        return redirect()->route('page.home');


     }


    /**
     * method form contact
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function formContact(Request $request)
    {

      // replace charaters especial

       $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
       $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");

       $setting = Setting::first();

       $contact = new Contact($request->all());
       $contact->status = 0;
       $contact->notification = 0;

       if(!empty($request->section))
       {
           $city = str_replace($no_permitidas, $permitidas ,$request->city);
           $section = str_replace($no_permitidas, $permitidas ,$request->section);

           $contact->city = strtolower($city);
           $contact->section = strtolower($section);

           if($contact->save())
           {
            //    Mail::to($setting->contact_email,'Administrador')->send(new ContactEmail($contact));
            //    Mail::to($contact->email,$contact->name)->send(new Welcome($contact));

               Flash('He recibido su mensaje, pronto me pondre en contacto contigo.')->success();
           }
           else
           {
               Flash('ha ocurrido un error, por favor intente de nuevo.')->error();
           }

           $url = request()->headers->get('referer');
           return redirect($url);

       }
       else
       {
           $city = str_replace($no_permitidas, $permitidas ,$request->city);
           $contact->city = strtolower($city);
           $contact->section = 'home';

           if($contact->save())
           {

               Mail::to($setting->contact_email,'Administrador')->send(new ContactEmail($contact));
               Mail::to($contact->email,$contact->name)->send(new Welcome($contact));

               Flash('He recibido su información, pronto me pondre en contacto contigo.')->success();

               return redirect()->route('page.home');
           }
           else
           {
               Flash('ha ocurrido un error, por favor intente de nuevo.')->error();

               return redirect()->route('page.home');
           }

       }

    }


    /**
     * method dates
     *
     * @return \Illuminate\Http\Response
     */

    private function setDates()
    {

        $monthsEs = [1=>'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        $daysEs = [1=>'Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];

       $contentDate = [
            $monthsEs,
            $daysEs
        ];

        return  $contentDate;

    }

    /**
     * method content
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    private function setContent($id)
    {
        $section = Section::find($id);
        $content = $section->Contents()->get();

        return $content;
    }

    /**
     * method seo
     *
     * @return \Illuminate\Http\Response
     */


    private function toolSeo($data)
    {
        $seoContent = [];

        if(is_array($data))
        {
            $seoContent['meta_title'] = $data['meta_title'];
            $seoContent['meta_description'] = $data['meta_description'];
            $seoContent['meta_keywords'] = $data['meta_keywords'];
        }
        else
        {
            $seo = Seo::find($data);

            $seoContent['meta_title'] = $seo->meta_title;
            $seoContent['meta_description'] = $seo->meta_description;
            $seoContent['meta_keywords'] = $seo->meta_keywords;
        }

        return $seoContent;
    }
}
