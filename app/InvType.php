<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\InvItem;

class InvType extends Model
{
    //
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('name', 'description', 'mass');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each invItem has one invType
    public function invitems() {
        return $this->hasMany('InvItem');
    }
}
