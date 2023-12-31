<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorizationForm extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function saleBooking()
    {
        return $this->hasOne(SaleBooking::class, 'id', 'app_id');
    }
}
