<?php

namespace RachidLaasri\LaravelInstaller\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;
use RachidLaasri\LaravelInstaller\Helpers\EnvironmentManager;
use Validator;
use Illuminate\Validation\Rule;

class EnvironmentController extends Controller
{
    /**
     * @var EnvironmentManager
     */
    protected $EnvironmentManager;

    /**
     * @param EnvironmentManager $environmentManager
     */
    public function __construct(EnvironmentManager $environmentManager)
    {
        $this->EnvironmentManager = $environmentManager;
    }

    /**
     * Display the Environment menu page.
     *
     * @return \Illuminate\View\View
     */
    public function environmentMenu()
    {
        return view('vendor.installer.environment');
    }

    /**
     * Display the Environment page.
     *
     * @return \Illuminate\View\View
     */
    public function environmentWizard()
    {
        if(Session::get('purchase_verified'))
        {

            $timezones = \DateTimeZone::listIdentifiers(\DateTimeZone::ALL);
            $envConfig = $this->EnvironmentManager->getEnvContent();
            return view('vendor.installer.environment-wizard', compact('envConfig', 'timezones'));
        }
        else
        {
            return redirect()->route('LaravelInstaller::welcome');
        }
    }

    /**
     * Display the Environment page.
     *
     * @return \Illuminate\View\View
     */
    public function environmentClassic()
    {
        $envConfig = $this->EnvironmentManager->getEnvContent();

        return view('vendor.installer.environment-classic', compact('envConfig'));
    }

    /**
     * Processes the newly saved environment configuration (Classic).
     *
     * @param Request $input
     * @param Redirector $redirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveClassic(Request $input, Redirector $redirect)
    {
        $message = $this->EnvironmentManager->saveFileClassic($input);

        return $redirect->route('LaravelInstaller::environmentClassic')
                        ->with(['message' => $message]);
    }

    /**
     * Processes the newly saved environment configuration (Form Wizard).
     *
     * @param Request $request
     * @param Redirector $redirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveWizard(Request $request, Redirector $redirect)
    {
        $rules = config('installer.environment.form.rules');
        $messages = [
            'environment_custom.required_if' => trans('installer_messages.environment.wizard.form.name_required'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $timezones = \DateTimeZone::listIdentifiers(\DateTimeZone::ALL);
            return view('vendor.installer.environment-wizard', compact('errors', 'envConfig', 'timezones'));
        }


        try {
            $conn = new \PDO("mysql:host=$request->database_hostname;dbname=$request->database_name", $request->database_username, $request->database_password);
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $results = $this->EnvironmentManager->saveFileWizard($request);

            return $redirect->route('LaravelInstaller::database')
                ->with(['results' => $results]);

        }
        catch(\PDOException $e)
        {
            Session::flash('db_connection_failed', __('installer_messages.environment.wizard.db_connection_failed'));
            return redirect()->route('LaravelInstaller::environmentWizard');
        }


    }
}
