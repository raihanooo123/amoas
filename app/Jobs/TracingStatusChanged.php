<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TracingStatusChanged implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $doc;
    public $lang;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($doc, $lang)
    {
        $this->doc = $doc;
        $this->lang = $lang;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email     = optional(optional($this->doc)->trace)->email ?? $this->doc->alt_email;
        $sender    = env('MAIL_USERNAME');
        
        \Mail::to($email)->send(new \App\Mail\TracingStatusChanged($this->doc, $this->lang));
    }
}
