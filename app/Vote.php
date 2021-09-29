<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $primaryKey='id';
    protected $table='votes';
    protected $fillable=['user_id','candidate_id','election_program_id'];

    public function users()
    {
        return $this->belongsTo('User','user_id');
    }
    public function candidates()
    {
        return $this->belongsTo('Candidate','candidate_id');
    }
    public function election_programs()
    {
        return $this->belongsTo('ElectionProgram','election_program_id');
    }

}
