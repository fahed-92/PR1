<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $primaryKey='id';
    protected $table='candidates';
    protected $fillable = [
        'first_name','last_name',
        'father_name','mother_name', 'email',
        'password','age','n_number',
        'nationality','description','election_title',
        'election_campaign','governorate','image'
    ];
    public function getImagePathAttribute($value)
    {
        return $value=public_path('dashboard/assets/images/candidates/'. $this->image);
    }
    public function election_programs()
    {
        return $this->belongsToMany(ElectionProgram::class,'election_program_candidate','candidate_id','election_program_id');
    }

}
