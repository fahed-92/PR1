<?php

namespace App\Http\Controllers;

use App\ElectionProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ElectionProgramsController extends Controller
{
    public function index()
    {
        return view('admins.electionProgram.index')->with('electionprogs',ElectionProgram::all());
    }

    public function create()
    {
        return view('admins.electionProgram.create');
    }
    public function store(Request $request)
    {
        $electionprogs=ElectionProgram::create([
            'title'=>$request['title'],
            'description'=>$request['description'],
            'start_date'=>$request['start_date'],
            'end_date'=>$request['end_date']
        ]);
        return redirect(route('admin.electionprog'));


    }
    public function edit($id)
    {
        //get specific categories and its translations
        $electionprog = ElectionProgram::find($id);

        if (!$electionprog)
            return redirect()->route('admin.electionprog')->with(['error' => 'This program not found ']);

        return view('admins.electionProgram.edit', compact('electionprog'));
    }
    public function update(Request $request,$id){

        $electionprog = ElectionProgram::find($id);
        $electionprog->update([
            'title'=>$request['title'],
            'description'=>$request['description'],
            'start_date'=>$request['start_date'],
            'end_date'=>$request['end_date']
        ]);
        return redirect(route('admin.electionprog'));
    }

    public function destroy($id)
    {

        try {
            $electionprog = ElectionProgram::find($id);
            if (!$electionprog)
                return redirect()->route('admin.electionprog')->with(['error' => 'This program not found ']);
            $electionprog->delete();
            return redirect()->route('admin.electionprog')->with(['success' => 'delete successfully']);

        } catch (\Exception $ex) {
//            return $ex;
            return redirect()->route('admin.electionprogs')->with(['error' => 'sorry']);
        }
    }

    public function changeStatus($id)
    {
        try {
            $electionprog = ElectionProgram::find($id);
            if (!$electionprog)
                return redirect()->route('admin.electionprog')->with(['error' => 'This program not found ']);

            $status =  $electionprog -> active  == 1 ? 0 : 1;

            $electionprog -> update(['active' =>$status ]);
            $electionprog->save();
            return redirect()->route('admin.electionprog')->with(['success' => 'Change Status Successfully']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.electionprogs')->with(['error' => 'sorry']);
        }
    }

}
