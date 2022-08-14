<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'item_id', 'user_id', 'request_id', 'weight', 'roasting', 'grind', 'quantity'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
