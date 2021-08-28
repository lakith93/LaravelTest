<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PO extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected  $fillable = [ 'zone_id', 'region_id', 'territory_id', 'distributor_id', 'date', 'po_number', 'remark' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'created_at', 'updated_at' ];

    public function poProducts()
    {
        return $this->hasMany(POProducts::class, 'po_id', 'id');
    }
}
