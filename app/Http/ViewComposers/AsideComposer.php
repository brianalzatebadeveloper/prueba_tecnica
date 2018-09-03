<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Setting;
use App\Content;
use App\Section;

class AsideComposer
{

	public function compose(View $view)
	{
		$settings = Setting::first();

	// form contact section
		$formContact = Section::find('7');
		$contentForm =  $formContact->Contents()->get();
	// footer section
		$footerPage = Section::find('8');
		$contentFooter = $footerPage->Contents()->get();



		$view->with('settings',$settings)->with('contentForm',$contentForm)->with('contentFooter',$contentFooter);
	}
}