<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;

    public function deals()
    {
        return $this->hasMany(Deal::class, 'salon_id');
    }
    public function freelancers()
    {
        return $this->hasMany(Freelancer::class, 'salon_id');
    }
}
