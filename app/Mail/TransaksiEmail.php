<?php

namespace App\Mail;

use App\Models\TransaksiPenjualan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransaksiEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $transaksi;

    public function __construct(TransaksiPenjualan $transaksi)
    {
        $this->transaksi = $transaksi;
    }

    public function build()
    {
        return $this->subject("Detail Transaksi: {$this->transaksi->id}")
                    ->view('emails.transaksi');
    }
}
