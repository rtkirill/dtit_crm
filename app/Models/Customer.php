<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ["name", "tel", "email", "status_id"];

    /**
     * Get the interests for the customer
     */
    public function interests()
    {
        return $this->hasMany(CustomerInterests::class);
    }

    /**
     * Get comments
     */
    public function comment()
    {
        return $this->hasOne(StatusComment::class);
    }
}
