<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content'];

    /**
     * Get the user that owns the problem.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
