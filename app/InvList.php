<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvList extends Model
{
    
    // MASS ASSIGNMENT -------------------------------------------------------
    /**
     * Mass assignable attributes
     */
    protected $fillable = array('name', 'description', 'location_id', 'updated_by');
    
    // DEFINE RELATIONSHIPS --------------------------------------------------
    /**
     * The items that belong to the list.
     */
    public function items()
    {
        return $this->belongsToMany('App\InvItem', 'inv_item_list', 'list_id', 'item_id');
    }
    
    /**
     * The location of the list.
     */
    public function location()
    {
        return $this->belongsTo('App\Location', 'location_id');
    }
    
    /**
     * The user that owns this list.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'updated_by_id');
    }
}
