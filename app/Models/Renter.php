<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function renter_equipment()
    {
        return $this->hasMany(RenterEquipment::class,'equipment_id');
    }

    public function renter_rating()
    {
        return $this->hasMany(Comment::class,'renter_id');
    }
}
