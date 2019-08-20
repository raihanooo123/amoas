<?php

namespace RachidLaasri\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RachidLaasri\LaravelInstaller\Helpers\DatabaseManager;

class DatabaseController extends Controller
{
    /**
     * @var DatabaseManager
     */
    private $databaseManager;

    /**
     * @param DatabaseManager $databaseManager
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    /**
     * Migrate and seed the database.
     *
     * @return \Illuminate\View\View
     */
    public function database()
    {
        if(DB::connection()->getDatabaseName())
        {
            $response = $this->databaseManager->migrateAndSeed();

            return redirect()->route('LaravelInstaller::settings')
                ->with(['message' => $response]);
        }
        else
        {
            Session::flash('db_connection_failed', __('installer_messages.environment.wizard.db_connection_failed'));
            return redirect()->route('LaravelInstaller::environmentWizard');
        }
    }
}
