<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\EnumCategoryName;
use App\Enums\EnumCategoryType;

class Team extends Model
{
    use HasFactory;
    // ATRIBUTS:
    protected $fillable = ['club_id','name','type'];

    protected $casts    = [
        'name' => EnumCategoryName::class,
        'type' => EnumCategoryType::class
    ];

    // METODES:
    public function getName():string {
        // return (int) $this->name === Constant::CATEGORY_NAME['FirstTeam'];
        return ($this->name === EnumCategoryName::FirstTeam) ? $this->name : 0;
    }

    public function getType():string {
        // return (int) $this->name === Constant::CATEGORY_TYPE['soccer'];
        return $this->name === EnumCategoryType::soccer;
    }

}
