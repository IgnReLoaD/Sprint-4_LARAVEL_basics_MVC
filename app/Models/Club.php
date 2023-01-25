<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    // ATRIBUTS:
    protected $fillable = ['name','foundation_year_month','palmares'];
    public $timestamps = false;
    
    // CLUBS 1--N ARENAS (Right Join) ... hasMany()
    public function arenas(){
        return $this->hasMany(Arena::class, 'id_arena');
    }     

    // CLUBS 1--N TEAMS (Right Join) ... hasMany()
    public function teams(){
        return $this->hasMany(Team_category::class, 'id_team');
    }     

}
