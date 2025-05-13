<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasUlids;

    protected $fillable = [
        'contact_email',
        'contact_phone_number',
        'contact_name',
        'total',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_address',
        'shipping_apartment',
        'shipping_city',
        'shipping_state',
        'shipping_zip',
        'shipping_country',
        'shipping_phone_number',
        'payment_proof',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
