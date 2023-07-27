<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffPlan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'available_minutes', 'available_sms', 'cost'];

    public function simCards()
    {
        return $this->hasMany(SimCard::class);
    }
}
