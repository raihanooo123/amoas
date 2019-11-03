<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use SMTPValidateEmail\Validator as SmtpEmailValidator;

class FinalizeNewBooking implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $booking;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo 'before validation';
        if(!$this->booking->user && !isset($this->booking->email) && (!isset($this->booking->info) && !isset($this->booking->info->email))) return 'No email provided.';
        
        echo 'after validation \\n';
        $email     = $this->booking->email ?? $this->booking->info->email ?? $this->booking->user->email;
        $sender    = env('MAIL_USERNAME');
        $validator = new SmtpEmailValidator($email, $sender);
        
        // If debug mode is turned on, logged data is printed as it happens:
        $results   = $validator->validate();
        var_dump($results);
        echo 'after validation \\n';
        if (!array_key_exists($email, $results) || $results[$email] == false)
            return 'The email provided was not a real email.';
        
        \Mail::to($email)->send(new \App\Mail\NewTimeBooked($this->booking, 'Mr. Asif Gulistani'));
        echo 'after email sent';
    }
}
