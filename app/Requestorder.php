<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requestorder extends Model
{
    //
    protected $fillable = [
        'user_id', 'delivery_name', 'delivery_address', 'delivery_address_number', 'delivery_address_tel', 'delivery_date',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
