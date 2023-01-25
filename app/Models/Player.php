<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    // ATRIBUTS:
    protected $fillable = ['teamCategory_id','name','number','birthdate','height','weight','position','goals','points','faults','assists','expulsions','available'];

    // PLAYERS 1--N ACTIONS (Right Join) ... hasMany()
    public function actions(){
        return $this->hasMany(Action::class, 'id_action');
    }

    // PLAYERS 1--N INJURIES (Right Join) ... hasMany()
    public function injuries(){
        return $this->hasMany(Injury::class, 'id_injury');
    }    

    // PLAYERS N--1 TEAM_CATEGORY (Left Join) ... belongsTo()
    public function team_category(){
        return $this->belongsTo(Team_category::class, 'id_team');
    }

}
