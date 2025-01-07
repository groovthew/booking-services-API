<?php

namespace App\Controllers;

use App\Models\RoomModel;
use CodeIgniter\Controller;

class RoomController extends Controller
{
    protected $roomModel;

    public function __construct()
    {
        $this->roomModel = new RoomModel();
    }

    public function selectRoom()
    {
        $roomId = $this->request->getPost('room_id');
        $roomModel = new \App\Models\RoomModel();
        $room = $roomModel->find($roomId);

        if (!$room) {
            return redirect()->to('/booking')->with('error', 'Room not found.');
        }

        // Simpan data kamar dan informasi check-in, check-out di sesi
        session()->set('selected_room', $room);
        session()->set('check_in_date', $this->request->getPost('check_in_date'));
        session()->set('check_out_date', $this->request->getPost('check_out_date'));
        session()->set('check_in_time', $this->request->getPost('check_in_time'));
        session()->set('check_out_time', $this->request->getPost('check_out_time'));

        return redirect()->to('/payment/' . $roomId);
    }

}
$checkInDate = session()->get('check_in_date') ?? '2025-01-01'; // Default nilai sementara

