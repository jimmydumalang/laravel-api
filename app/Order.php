<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    /**
     * Get the user that the order belongs to.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}