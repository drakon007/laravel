<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'path', 'discription', 'category'
    ];

    protected $withCount = [
        'likes',
    ];

    public function raiting(): HasMany
    {
        return $this->hasMany(Raiting::class);
    }

    public function usersRating(): HasOne
    {
        return $this->votes()->one()->where('user_id', auth()->id());
    }
}
