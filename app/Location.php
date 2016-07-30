<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('name', 'description');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each invItem can have a Location
    public function invitems() {
        return $this->morphMany('InvItem', 'storeable');
    }
}
