<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\ElectionProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GetCandidateController extends Controller
{
    public function get($id)
    {
         $program=ElectionProgram::find($id);
          $canidates=$program->candidates()->get();
        return view('site.candidates.get')->with(compact('canidates'));
    }
    public function show($id)
    {
         $candidate=Candidate::find($id);
//         $canidates=$program->candidates()->get();
        return view('site.candidates.show')->with(compact('candidate'));
    }


    public function create($prog_id)
    {
         $electionprogs=ElectionProgram::find($prog_id);
        return view('site.candidates.candidacyRequest')->with('electionprogs',$electionprogs);
    }
    public function store(Request $request)
    {
//        $fileExtension=$request->image->getClientOriginalExtension();
//            $filename = time() . '.' . $fileExtension;
//            $path='dashboard/assets/images/candidates';


//        return $request;
//        $filePath = "";
        if ($request->has('image')) {
//
            $image = $request->file('image');
            $folder = public_path('dashboard/assets/images/candidates/');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path=$folder.$filename;
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0775, true, true);
            }
            $image->move($folder,$filename);
//            return $filename;
        }
        $candidate=Candidate::create([
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
            'image' => $filename,
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        if ($request->has('election_title')){
            $candidate->election_programs()->syncWithoutDetaching($request['election_title']);
        }
        return redirect(route('elctionprog.get'));
    }
}
