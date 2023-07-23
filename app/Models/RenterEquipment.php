<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenterEquipment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function renter()
    {
        return $this->belongsTo(Renter::class, 'renter_id');
    }
    
    public function equipment()
    {
        return $this->belongsTo(MasterEquipment::class, 'equipment_id');
    }
}
