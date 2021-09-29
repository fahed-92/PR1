<?php

namespace App\Http\Controllers;

use App\ElectionProgram;
use Illuminate\Http\Request;

class BrowseProgElectionController extends Controller
{
    public function get()
    {
        $elctionprogs=ElectionProgram::where('active',1)->get();
        return view('site.elctionprog.browse')->with('electionprogs',ElectionProgram::all());
    }
    public function show($id)
    {
        $elctionprog=ElectionProgram::find($id);
        return view('site.elctionprog.show')->with('electionprog',$elctionprog);
    }
}
