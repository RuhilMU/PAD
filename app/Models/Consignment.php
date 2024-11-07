<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consignment extends Model
{
    use HasFactory;

    protected $primaryKey = 'consignment_id';
    protected $fillable = [
        'product_id',
        'store_id',
        'quantity',
        'status', 
        'entry_date', 
        'exit_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function getCirculationDurationAttribute()
    {
        return $this->exit_date
            ? $this->entry_date->diffInDays($this->exit_date)
            : null;
    }

    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->product->price;
    }
}

