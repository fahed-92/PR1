<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\ElectionProgram;
use App\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function warning($id)
    {
        $candidate=Candidate::find($id);
         $electionprog=$candidate->election_programs()->first();
        return view('site.vote.voting_warning',compact(['candidate','electionprog']));
    }
    public function store(Request $request)
    {

        $vote=Vote::create($request->all());
        return redirect(route('home'));
    }
}
