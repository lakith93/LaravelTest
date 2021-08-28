<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected  $fillable = [ 'code', 'long_des', 'short_des'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'created_at', 'updated_at' ];

    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
