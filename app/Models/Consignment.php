<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Consignment extends Model
{
    use HasFactory;

    protected $primaryKey = 'consignment_id';
    protected $fillable = [
        'product_id',
        'store_id',
        'quantity',
        'entry_date', 
        'exit_date',
    ];

    protected $dates = [
        'entry_date',
        'exit_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'store_id');
    }

    public function getCirculationDurationAttribute()
    {
        return $this->exit_date
            ? $this->entry_date->diffInDays($this->exit_date)
            : null;
    }

    public function getStatusAttribute()
    {
        return $this->exit_date ? 'close' : 'open';
    }


    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->product->price;
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($consignment) {
    //         if ($consignment->entry_date && $consignment->exit_date) {
    //             $diffInDays = $consignment->entry_date->diffInDays($consignment->exit_date);

    //             $consignment->status = $diffInDays >= 7 ? 'close' : 'open';
    //         }
    //     });
    // }
}

