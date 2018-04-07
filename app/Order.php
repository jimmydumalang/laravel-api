<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Uuid;

class Order extends Model
{
    protected $table = "orders";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
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

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string)Uuid::generate(4);
        });
    }

}