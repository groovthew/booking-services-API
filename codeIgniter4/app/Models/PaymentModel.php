<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['booking_id', 'payment_method', 'amount', 'payment_status', 'payment_date', 'transaction_id'];

    // Dapatkan informasi pembayaran berdasarkan booking ID
    public function getPaymentByBookingId($bookingId)
    {
        return $this->where('booking_id', $bookingId)->first();
    }

    // Simpan informasi pembayaran
    public function savePayment($data)
    {
        return $this->save($data);
    }
}
