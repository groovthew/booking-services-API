<?php

namespace App\Controllers;

use App\Models\PaymentModel;
use App\Models\RoomModel;
use CodeIgniter\Controller;

class PaymentController extends Controller
{
    protected $paymentModel;

    public function __construct()
    {
        $this->paymentModel = new PaymentModel();
    }

    public function index($roomId)
{
    $roomModel = new \App\Models\RoomModel();
    $bookingModel = new \App\Models\BookingModel();

    // Ambil detail kamar
    $room = $roomModel->find($roomId);

    // Ambil detail booking terkait room_id
    $booking = $bookingModel->where('room_id', $roomId)->first();

    if (!$room || !$booking) {
        return redirect()->to('/booking')->with('error', 'Data booking atau kamar tidak ditemukan.');
    }

    // Hitung durasi
    $checkInDate = new \DateTime($booking['check_in_date']);
    $checkOutDate = new \DateTime($booking['check_out_date']);
    $duration = $checkInDate->diff($checkOutDate)->days;

    // Ambil total harga
    $totalAmount = $booking['total_price'];

    // Passing data ke view
    return view('payment', [
        'room' => $room, // Data kamar dari tabel rooms
        'check_in_date' => $booking['check_in_date'], // Tanggal check-in
        'check_out_date' => $booking['check_out_date'], // Tanggal check-out
        'duration' => $duration, // Lama menginap dalam malam
        'total_amount' => $totalAmount, // Total harga
    ]);
}



    public function processPayment()
    {
        $selectedRoom = session()->get('selected_room');
        $checkInDate = session()->get('check_in_date');
        $checkOutDate = session()->get('check_out_date');
        $totalAmount = $this->request->getPost('amount'); // Pastikan totalAmount diinputkan

        if (!$selectedRoom || !$checkInDate || !$checkOutDate) {
            return redirect()->to('/booking')->with('error', 'Payment failed. Please complete your booking first.');
        }

        $this->paymentModel->save([
            'booking_id' => $this->request->getPost('booking_id'),
            'payment_method' => $this->request->getPost('payment_method'),
            'amount' => $totalAmount,
            'payment_status' => 'paid',
        ]);

        // Hapus sesi setelah pembayaran berhasil
        session()->remove(['selected_room', 'check_in_date', 'check_out_date', 'check_in_time', 'check_out_time']);

        return redirect()->to('/payment/success');
    }


    public function success()
    {
        return view('payment_success');
    }
    
}

