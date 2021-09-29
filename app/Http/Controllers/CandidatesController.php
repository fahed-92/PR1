<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\ElectionProgram;
use Illuminate\Http\Request;

class CandidatesController extends Controller
{
    public function index()
    {
        $candidates= Candidate::where('approved',1)->get();
        return view('admins.candidates.index')->with('candidates',$candidates);
    }
    public function show($id){
        return view('admins.candidates.show')->with('candidate', Candidate::find($id));
    }
    public function create()
    {
        return view('admins.candidates.create')->with('candidates',Candidate::all());
    }
    public function store(Request $request)
    {
//        return $request;
        Candidate::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'father_name' => $request['father_name'],
            'mother_name' => $request['mother_name'],
            'age' => $request['age'],
            'n_number' => $request['n_number'],
            'election_program_id' => 1,
            'nationality' => $request['nationality'],
            'governorate' => $request['governorate'],
            'description' => $request['description'],
            'election_title' => $request['election_title'],
            'election_campaign' => $request['election_campaign'],
            'image' => $request['image'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect(route('admin.candidate'));
    }
    public function edit($id)
    {
        $candidate = Candidate::find($id);

        if (!$candidate){
            return redirect()->route('admin.candidate')->with(['error' => 'This Candidate not found ']);

        }
        return view('admins.candidates.edit')->with(compact('candidate'));
    }
    public function update(Request $request,$id)
    {
        try{
            $candidate=Candidate::find($id);
            $candidate->update([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'father_name' => $request['father_name'],
                'mother_name' => $request['mother_name'],
                'age' => $request['age'],
                'n_number' => $request['n_number'],
                'election_program_id' => 1,
                'nationality' => $request['nationality'],
                'governorate' => $request['governorate'],
                'description' => $request['description'],
                'election_title' => $request['election_title'],
                'election_campaign' => $request['election_campaign'],
                'image' => $request['image'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
            ]);
            return redirect(route('admin.candidate'));
    }
    catch(\Exception $ex){
            return $ex->getMessage();
        return redirect()->route('admin.candidate')->with(['error' => 'sorry']);

    }

    }
    public function destroy($id)
    {

        try {
            $candidate = Candidate::find($id);
            if (!$candidate)
                return redirect()->route('admin.candidate')->with(['error' => 'This candidate not found ']);
            $candidate->delete();
            return redirect()->route('admin.candidate')->with(['success' => 'delete successfully']);

        } catch (\Exception $ex) {
//            return $ex;
            return redirect()->route('admin.candidate')->with(['error' => 'sorry']);
        }
    }
    public function changeStatus($id)
    {
        try {
            $candidate = Candidate::find($id);
            if (!$candidate)
                return redirect()->route('admin.candidate')->with(['error' => 'This candidate not found ']);

            $status =  $candidate -> active  == 1 ? 0 : 1;

            $candidate -> update(['active' =>$status ]);
            return redirect()->route('admin.candidate')->with(['success' => 'Change Status Successfully']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.candidate')->with(['error' => 'sorry']);
        }
    }
    public function requests()
    {
        $candidate=Candidate::where('candidates.approved',0)->get();
        return view('admins.requests.requests')->with('candidates',$candidate);
    }
    public function show_request($id){
        return view('admins.requests.show_requests')->with('candidate',Candidate::find($id));
    }
    public function approved($id)   {
        try {
            $candidate = Candidate::find($id);
            if (!$candidate)
                return redirect()->route('admin.candidate')->with(['error' => 'This candidate not found ']);
            $candidate -> update(['aprroved' => 1 ]);
            return redirect()->route('admin.candidate')->with(['success' => 'approved Successfully']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.candidate')->with(['error' => 'sorry']);
        }
    }
}
