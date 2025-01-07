<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomModel extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'id';
    protected $allowedFields = ['room_name', 'room_type', 'price_per_night', 'availability'];

    // Fungsi untuk mencari kamar yang tersedia berdasarkan tanggal
    public function findAvailableRooms($checkInDate, $checkOutDate)
    {
        return $this->where('availability', 1)
                    ->findAll(); // Bisa disesuaikan dengan kondisi tertentu jika perlu
    }
}
