<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Enums\EnumCategoryName;
// use App\Enums\EnumCategoryType;

class Team extends Model
{
    use HasFactory;
    // ATRIBUTS:
    protected $fillable = ['id','club_id','name','type'];
    public $timestamps = false;

    // protected $casts    = [
    //     'name' => EnumCategoryName::class,
    //     'type' => EnumCategoryType::class
    // ];

    // TEAMS 1--N PLAYERS (Right Join) ... hasMany()
    public function players(){
        return $this->hasMany(Player::class, 'id_player');
    }    

    // METODES:
    public function getId():integer {
        return $this->id;
    }

    public function getName():string {
        // return (int) $this->name === Constant::CATEGORY_NAME['FirstTeam'];
        // return ($this->name === EnumCategoryName::FirstTeam) ? $this->name : 0;
        return ($this->name);    
    }

    public function getType():string {
        // return (int) $this->name === Constant::CATEGORY_TYPE['soccer'];
        // return $this->name === EnumCategoryType::soccer;
        return $this->type;
    }

}
