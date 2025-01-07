<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'room_id',
        'check_in_date',
        'check_out_date',
        'total_price',
        'status',
    ];
}

