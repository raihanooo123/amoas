<?php

namespace RachidLaasri\LaravelInstaller\Controllers;


use App\Http\Requests\installerSettings;
use App\Role;
use App\Settings;
use App\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class settingsController extends Controller
{
    public function load()
    {
        //check DB connection
        if(DB::connection()->getDatabaseName() && Schema::hasTable('settings'))
        {
            $settings = Settings::find(1);

            if(!$settings)
            {
                //setup is not performed already, load setup view
                return view('vendor.installer.settings');
            }
            else
            {
                //setup is already performed, redirect to homepage
                return redirect()->route('index');
            }
        }
        else
        {
            return view('errors.db');
        }
    }

    public function save(installerSettings $request)
    {
        $input = $request->all();

        //create settings
        Settings::create([
            'id' => 1,
            'business_name' => $input['business_name'],
            'default_currency' => $input['default_currency'],
            'contact_email' => $input['contact_email'],
            'contact_number' => $input['contact_number'],
            'lang' => $input['lang']
        ]);

        App::setLocale($input['lang']);

        //create role admin
        Role::create([
            'id' => 1,
            'name' => __('app.administrator')
        ]);

        //create role customer
        Role::create([
            'id' => 2,
            'name' => __('app.customer')
        ]);

        //create admin user
        User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'role_id' => 1,
        ]);


        //seed database
        Artisan::call('db:seed' , ['--force' => true]);

        //redirect to login

        return redirect()->route('LaravelInstaller::final');
    }
}