<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'author'
    ];

    public function Users()
    {
        return $this->belongsTo(User::class);
    }
}
