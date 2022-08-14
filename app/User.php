<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',  'email', 'adress_number', 'address', 'tel', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'admin_flag',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function informations()
    {
        return $this->hasMany(Information::class);
    }
    
    public function news()
    {
        return $this->hasMany(News::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    public function requestorders()
    {
        return $this->hasMany(Requestorder::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('informations', 'orders');
    }
    
    
    
    
    
    
}
