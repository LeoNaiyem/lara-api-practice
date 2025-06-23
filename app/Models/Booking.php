<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $connection = 'mysql_noprefix';
    public $timestamps = false;

    protected $table = 'core_bookings';
    protected $fillable = ['order_total', 'paid_total', 'remark', 'customer_id', 'created_at'];

}
