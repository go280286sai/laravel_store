<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_description extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = ['user_id', 'gender_id', 'last_name', 'birthday', 'phone'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public static function set_update(int $id, array $data): true
    {

        $obj = self::find($id);
        $obj->fill($data);
        $obj->save();

        return true;
    }
}
