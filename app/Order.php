<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'type',
        'origin_name',
        'origin_address',
        'destination',
        'contact',
        'user_id'
    ];

    /**
     * Get the user that the order belongs to.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}