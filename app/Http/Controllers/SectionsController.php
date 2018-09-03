<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use Laracasts\Flash\Flash;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Section::orderBy('id', 'ASC')->get();

        return view('admin.sections.index')->with('records',$records);
    }

}
