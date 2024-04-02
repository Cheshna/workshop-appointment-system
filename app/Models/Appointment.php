<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // protected $table = 'unavailable_dates';
    protected $fillable = ['status', 'user_id', 'vehicle', 'date', 'time', 'service'];
    public $incrementing = false;

    public function unavailable_dates()
    {
        return $this->hasMany(unavailable_dates::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }

}
