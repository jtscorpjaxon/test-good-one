<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
