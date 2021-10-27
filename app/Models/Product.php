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
    public $warehouse_remainder;

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'product_materials', 'product_id', 'material_id')->withPivot('quantity');
    }

    public function getWareHouseAttribute()
    {
        $result = [];
        foreach ($this->materials as $material) {
            $calc = $material->pivot->quantity * $this->qty;
            foreach ($material->warehouses as $warehouse) {
                $remainder = ($this->warehouse_remainder[$warehouse->id] ?? null);
                if ($remainder < 0) {
                    continue;
                } elseif ($remainder === null)
                    $this->warehouse_remainder[$warehouse->id] = $warehouse->remainder;

                if ($calc <= 0) break;
                $diff = $calc - $this->warehouse_remainder[$warehouse->id];
                if ($diff > 0) {
                    $qty = $this->warehouse_remainder[$warehouse->id];
                    $this->warehouse_remainder[$warehouse->id] = 0;
                    $calc -= $qty;
                } else {
                    $qty = $calc;
                    $this->warehouse_remainder[$warehouse->id] -= $calc;
                    $calc = 0;
                }
                $result[] = [
                    "warehouse_id" => $warehouse->id,
                    "material_name" => $material->name,
                    "qty" => $qty,
                    "price" => $warehouse->price,
                ];

            }
            if ($calc > 0)
                $result[] = [
                    "warehouse_id" => null,
                    "material_name" => $material->name,
                    "qty" => $calc,
                    "price" => null,
                ];
        }
        return $result;
    }

    public function getQtyAttribute()
    {
        return $this->qty;
    }

    public function setQtyAttribute($value)
    {
        $this->qty = $value;
    }

}
