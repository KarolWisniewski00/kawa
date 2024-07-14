<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $fillable = [
        'number', 'name', 'email', 'company', 'nip', 'post', 'adres', 'adres_extra',
        'city', 'phone', 'status', 'total', 'user_id', 'adres_type', 'extra',
        'post_invoice', 'adres_invoice', 'adres_extra_invoice', 'city_invoice', 'name_recive', 'email_recive', 'phone_recive',
        'point','shipment_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function orderlogs()
    {
        return $this->hasMany(OrderLog::class);
    }
}
