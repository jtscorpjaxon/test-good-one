<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];
    protected $appends = [
        'qty',
    ];
    public function materials()
    {
        return $this->belongsToMany(Material::class,'product_materials', 'product_id', 'material_id')->withPivot('quantity');
    }

    public function getWareHouseAttribute()
    {
        foreach ($this->materials as $material)
            dd($material);
    }
    public function getQtyAttribute()
    {
       return $this->qty ;
    }
    public function setQtyAttribute($value)
    {
        $this->qty = $value;
    }
}
