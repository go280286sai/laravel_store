<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @return HasMany
     */
    public function user_descriptions(): HasMany
    {
        return $this->hasMany(User_description::class);
    }

    /**
     * @param int $id
     * @param array $data
     * @return true
     */
    public static function set_update(int $id, array $data): true
    {
        $obj = self::find($id);
        $obj->fill($data);
        if (!is_null($data['new_password'])) {
            $obj->password = Hash::make($data['new_password']);
        }
        $obj->save();

        return true;
    }

    /**
     * @return bool
     */
    public static function is_admin(): bool
    {
        $admin = self::find(Auth::user()->id);
        if ($admin->is_admin) {
            return true;
        } else {
            return false;
        }
    }
}
