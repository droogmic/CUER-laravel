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
        return $this->hasMany('App\InvItem', 'type_id');
    }
    
    // GET ITEM COUNT
    // https://softonsofa.com/tweaking-eloquent-relations-how-to-get-hasmany-relation-count-efficiently/
    public function invitemsCount()
    {
      return $this->hasOne('App\InvItem', 'type_id')
        ->selectRaw('type_id, count(*) as aggregate')
        ->groupBy('type_id');
    }
     
    public function getInvitemsCountAttribute()
    {
      // if relation is not loaded already, let's do it first
      if ( ! $this->relationLoaded('invitemsCount'))
        $this->load('invitemsCount');
     
      $related = $this->getRelation('invitemsCount');
     
      // then return the count directly
      return ($related) ? (int) $related->aggregate : 0;
    }
 
}
