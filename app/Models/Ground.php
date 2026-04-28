<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ground extends Model
{
    use HasFactory;

    protected $table = 'grounds';

    protected $fillable = [
        'name',
        'location',
        'city',
        'state',
        'country',
        'pincode',
        'capacity',
        'ground_type',
        'pitch_type',
        'boundary_size',
        'has_floodlights',
        'has_dressing_room',
        'has_parking',
        'match_type_supported',
        'booking_price',
        'status',
        'description'
    ];
}