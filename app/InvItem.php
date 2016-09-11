<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvItem extends Model
{
    
    // MASS ASSIGNMENT -------------------------------------------------------
    /**
     * Mass assignable attributes
     */
    protected $fillable = array('type_id', 'updated_by_id', 'reference');
    
    // DEFINE RELATIONSHIPS --------------------------------------------------
    /**
     * The invType that this item is.
     */
    public function invtype()
    {
        return $this->belongsTo('App\InvType', 'type_id');
    }
    
    /**
     * The location of the item.
     */
    public function location()
    {
        return $this->belongsTo('App\Location', 'location_id');
    }
    
    /**
     * The user that owns this item.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'updated_by_id');
    }
    
    // storeable items can contain invItems
    // public function storeable()
    // {
    //     return $this->morphTo();
    // }

    /**
     * The lists that this item belongs to.
     */
    public function lists()
    {
        return $this->belongsToMany('App\InvList', 'inv_item_list', 'item_id', 'list_id');
    }
}
