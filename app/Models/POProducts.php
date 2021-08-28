<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POProducts extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['po_id', 'sku_code', 'up', 'units', 'total'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

//    public function po()
//    {
//        return $this->belongsTo(PO::class);
//    }
}
