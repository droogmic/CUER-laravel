<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvCategory extends Model
{
    
    // MASS ASSIGNMENT -------------------------------------------------------
    /**
     * Mass assignable attributes
     */
    protected $fillable = array('name', 'description');
    
    // DEFINE RELATIONSHIPS --------------------------------------------------
    /**
     * The types that belong to the list.
     */
    public function types()
    {
        return $this->belongsToMany('App\InvType', 'inv_types_categories', 'type_id', 'category_id');
    }
    
    /**
     * The team that owns this list.
     */
    /*public function team() {
        return $this->pluck('team');
    }
    */
}
