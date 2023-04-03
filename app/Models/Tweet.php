<?php

namespace App\Models;

use App\Models\User;
use App\Events\TweetCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tweet extends Model
{
    public function user(): BelongsTo
    { return $this->belongsTo(User::class);}

    protected $dispatchesEvents = [
        'created' => TweetCreated::class,
    ];

    use HasFactory;

    protected $fillable = [
        'message',
    ];
    
}
