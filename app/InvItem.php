<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\InvType;

class InvItem extends Model
{
    //
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('type_id', 'updated_by_id', 'reference');
    
    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each invTyp has many invItems
    public function invtype() {
        return $this->belongsTo('App\InvType', 'type_id');
    }
    
    // each user has many invItems
    public function user() {
        return $this->belongsTo('App\User', 'updated_by_id');
    }
    
    // storeable items can contain invItems
    // public function storeable()
    // {
    //     return $this->morphTo();
    // }
    
}
