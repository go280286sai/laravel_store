<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'notes', 'status', 'total', 'qty',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order_products(): HasMany
    {
        return $this->hasMany(Order_product::class);
    }

    public static function add(array $data)
    {
        $obj = new self();
        $obj->fill($data);
        $obj->save();

        return $obj->id;
    }
}
