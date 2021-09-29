<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectionProgram extends Model
{
    protected $primaryKey='id';
    protected $table='election_programs';
    protected $fillable = [
        'title', 'description',
        'start_date', 'end_date','active'
    ];
    public function votes()
    {
        return $this->hasMany('Vote','election_program_id');
    }
    public function candidates()
    {
        return $this->belongsToMany(Candidate::class,'election_program_candidate','election_program_id','candidate_id');
    }
}
