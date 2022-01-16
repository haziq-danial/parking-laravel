<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $primaryKey = 'car_id';

    protected $fillable = [
        'user_id',
        'carPlate',
        'snPicture',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
