<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Main_description extends Model
{
    use HasFactory;

    public function mains(): BelongsTo
    {
        return $this->belongsTo(Main::class);
    }

    public function languages(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public static function getDescription(int $id): mixed
    {
        return self::where('main_id', $id)->where('language_id', Language::getStatus()->id)->get();
    }

    public function get_title(int $id): mixed
    {
        return self::find($id)->title;
    }
}
