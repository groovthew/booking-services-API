<?php

namespace App\Controllers;

use App\Models\RoomModel;
use App\Models\BookingModel;
use App\Models\PaymentModel;

class BookingController extends BaseController
{
    public function searchRooms()
    {
        $roomModel = new RoomModel();
        $checkInDate = $this->request->getPost('check_in_date');
        $checkOutDate = $this->request->getPost('check_out_date');

        $rooms = $roomModel->findAvailableRooms($checkInDate, $checkOutDate);

        return view('room', [
            'rooms' => $rooms,
            'check_in_date' => $checkInDate,
            'check_out_date' => $checkOutDate,
        ]);
    }

    public function selectRoom()
    {
        $roomId = $this->request->getPost('room_id');
        $checkInDate = $this->request->getPost('check_in_date');
        $checkOutDate = $this->request->getPost('check_out_date');

        $roomModel = new RoomModel();
        $room = $roomModel->find($roomId);

        $duration = (new \DateTime($checkInDate))->diff(new \DateTime($checkOutDate))->days;
        $totalAmount = $duration * $room['price_per_night'];

        return view('payment', [
            'room' => $room,
            'check_in_date' => $checkInDate,
            'check_out_date' => $checkOutDate,
            'duration' => $duration,
            'total_amount' => $totalAmount,
        ]);
    }

    public function processPayment()
    {
        $bookingModel = new BookingModel();
        $paymentModel = new PaymentModel();
        $roomModel = new RoomModel();

        $data = $this->request->getPost();

        // Simpan data pemesanan ke tabel bookings
        $bookingData = [
            'room_id' => $data['room_id'],
            'check_in_date' => $data['check_in_date'],
            'check_out_date' => $data['check_out_date'],
            'total_price' => $data['total_amount'],
            'status' => 'confirmed',
        ];
        $bookingId = $bookingModel->insert($bookingData);

        // Simpan data pembayaran ke tabel payments
        $paymentData = [
            'booking_id' => $bookingId,
            'payment_method' => $data['payment_method'],
            'amount' => $data['total_amount'],
            'status' => 'success',
        ];
        $paymentModel->insert($paymentData);

        // Perbarui status kamar menjadi tidak tersedia
        $roomModel->update($data['room_id'], ['availability' => 0]);

        return view('payment_success');
    }
}
