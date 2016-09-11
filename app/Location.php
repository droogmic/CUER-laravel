<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //

    // MASS ASSIGNMENT -------------------------------------------------------
    protected $fillable = array('name', 'description');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each invItem can have a Location
    // public function invitems() {
    //     return $this->morphMany('InvItem', 'storeable');
    // }
}
