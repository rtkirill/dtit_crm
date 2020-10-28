<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInterests extends Model
{
    use HasFactory;

    protected $fillable = ["customer_id", "interest"];

    protected $touches = ['customer'];

    /**
     * Get customer to update timestamp
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
