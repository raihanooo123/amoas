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

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return 'working';
        $afgLogo = (string) \Image::make('images/afg-logo.png')->encode('data-url');
        $qrCode = new QrCode($this->booking->serial_no);
        $qrCode->setWriterByName('png');
        $qrCode->setMargin(10);
        $qrCode->setEncoding('UTF-8');
        $qrCode->setSize(200);
        // Save it to a file
        $qrCode->writeFile('temp/qrcode.png');
        $qrCode = (string) \Image::make('temp/qrcode.png')->encode('data-url');

        $this->subject('You have successfully reserved a set on ' . $this->booking->department->name_en);
        return $this->view('emails.new-booking', compact('booking', 'afgLogo', 'qrCode'));
    }
}
