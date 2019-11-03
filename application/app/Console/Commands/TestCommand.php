<?php

namespace App\Console\Commands;

use App\Booking;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:do';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $booking = Booking::latest()->first();

        // echo 'after logo';
        // $afgLogo = (string) \Image::make('images/afg-logo.png')->encode('data-url');
        // $qrCode = new QrCode($this->booking->serial_no);
        // $qrCode->setWriterByName('png');
        // $qrCode->setMargin(10);
        // $qrCode->setEncoding('UTF-8');
        // $qrCode->setSize(200);

        // // Save it to a file
        // $qrCode->writeFile('temp/qrcode.png');
        // $qrCode = (string) \Image::make('temp/qrcode.png')->encode('data-url');
        // echo 'after qr data-url';
        $booking = \App\Booking::find(108);
        $booking->load(['user', 'info', 'package', 'department']);

        \App\Jobs\FinalizeNewBooking::dispatch($booking);

        // \Mail::to('a.gulistani@mfa.af')->send(new \App\Mail\NewTimeBooked(\App\Booking::find(106)));
    }
}
