<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ImportPassportTracingExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $passportArr;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($passportArr)
    {
        $this->passportArr = $passportArr;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        session(['totalCount' => count($passportsArr[0])]);
        // $this->impProgressTotalCount = count($passportsArr[0]);
        //Get the uids that already exist
        $alreadyExist = Passport::whereIn('uid', array_column($passportsArr[0], 'id'))->get();
        $alreadyExist = optional($alreadyExist)->pluck('uid')->toArray();

        foreach($passportsArr[0] as $passport){
            if(!in_array($passport['id'], $alreadyExist))
                if($passport['id'] != null){
                    $pass = Passport::create([
                            'uid' => $passport['id'],
                            'family_name' => $passport['family_name'],
                            'given_name' => $passport['given_names'],
                            'passport_no' => $passport['passport_no'],
                            'department_id' => $request->department_id,
                            'status' => $passport['status'],
                            'date' => !$passport['date'] ?: \Carbon\Carbon::createFromFormat('d-M-Y',$passport['date'])->format('Y-m-d'),
                        ]);
                            
                    $pass->trace()->create([
                            'department_id' => $request->department_id,
                            'uid' => $passport['id'],
                            'status' => $passport['status'],
                            'is_public' => $request->is_public,
                            'note' => $request->note,
                            'registrar_id' => auth()->id(),
                            'applicant' => $passport['given_names'] . ' ' . $passport['family_name'],
                        ]);
                }
            session(['progressCount' => session('progressCount', -1) + 1]);
        }
    }
}
