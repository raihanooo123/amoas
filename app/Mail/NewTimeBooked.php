<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Endroid\QrCode\QrCode;

class NewTimeBooked extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $name;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking, $name = null)
    {
        $this->booking = $booking;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('You have successfully reserved a set on ' . $this->booking->department->name_en);
        return $this->view('print-booking-success');
    }
}
