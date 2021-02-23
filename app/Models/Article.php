<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Article extends Model
{
//    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'summary',
        'content',
        'status',
        'image',
        'slug',
        'published_at',
    ];

    protected $dates = ['published_at'];

    /**
     * Set the date attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function getDateAttribute($value)
    {
        $this->attributes['published_at'] = Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
