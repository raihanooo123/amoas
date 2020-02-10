<?php return array (
  'app' => 
  array (
    'name' => 'AMOAS Afghanistan missions Online Appointment System',
    'env' => 'production',
    'debug' => false,
    'url' => 'https://bonn.mfa.af/amoas/',
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'key' => 'base64:wzus4OJEJzZJdSyxF8MAuuudIBDfEWMfrnSbzY941SU=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'Cartalyst\\Stripe\\Laravel\\StripeServiceProvider',
      23 => 'RachidLaasri\\LaravelInstaller\\Providers\\LaravelInstallerServiceProvider',
      24 => 'Intervention\\Image\\ImageServiceProvider',
      25 => 'Barryvdh\\DomPDF\\ServiceProvider',
      26 => 'Laravel\\Socialite\\SocialiteServiceProvider',
      27 => 'App\\Providers\\AppServiceProvider',
      28 => 'App\\Providers\\AuthServiceProvider',
      29 => 'App\\Providers\\EventServiceProvider',
      30 => 'App\\Providers\\RouteServiceProvider',
      31 => 'Spatie\\GoogleCalendar\\GoogleCalendarServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Stripe' => 'Cartalyst\\Stripe\\Laravel\\Facades\\Stripe',
      'GoogleCalendar' => 'Spatie\\GoogleCalendar\\GoogleCalendarFacade',
      'Image' => 'Intervention\\Image\\Facades\\Image',
      'PDF' => 'Barryvdh\\DomPDF\\Facade',
      'Socialite' => 'Laravel\\Socialite\\Facades\\Socialite',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'encrypted' => true,
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/var/www/vhosts/bonn.mfa.af/amoas/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
    ),
    'prefix' => 'amoas_afghanistan_missions_online_appointment_system_cache',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'bonnmfa_amoas',
        'prefix' => '',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'bonnmfa_amoas',
        'username' => 'amoas',
        'password' => 'Xkj6t9%1',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => true,
        'engine' => 'InnoDB',
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'bonnmfa_amoas',
        'username' => 'amoas',
        'password' => 'Xkj6t9%1',
        'charset' => 'utf8',
        'prefix' => '',
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'bonnmfa_amoas',
        'username' => 'amoas',
        'password' => 'Xkj6t9%1',
        'charset' => 'utf8',
        'prefix' => '',
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'default' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/vhosts/bonn.mfa.af/amoas/storage/app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/vhosts/bonn.mfa.af/amoas/storage/app/public',
        'url' => 'https://bonn.mfa.af/amoas//storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
        'url' => NULL,
      ),
      'verification' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/vhosts/bonn.mfa.af/amoas/storage/app/verification',
      ),
      'visa' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/vhosts/bonn.mfa.af/amoas/storage/app/visa',
      ),
    ),
  ),
  'google-calendar' => 
  array (
    'service_account_credentials_json' => '/var/www/vhosts/bonn.mfa.af/amoas/storage/app/google-calendar/service-account-credentials.json',
    'calendar_id' => NULL,
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
  ),
  'installer' => 
  array (
    'core' => 
    array (
      'minPhpVersion' => '7.1.3',
    ),
    'final' => 
    array (
      'key' => true,
      'publish' => true,
    ),
    'requirements' => 
    array (
      'php' => 
      array (
        0 => 'openssl',
        1 => 'pdo',
        2 => 'mbstring',
        3 => 'tokenizer',
        4 => 'xml',
        5 => 'ctype',
        6 => 'JSON',
        7 => 'cURL',
      ),
      'apache' => 
      array (
        0 => 'mod_rewrite',
      ),
    ),
    'permissions' => 
    array (
      'storage/framework/' => '755',
      'storage/logs/' => '755',
      'bootstrap/cache/' => '755',
    ),
    'environment' => 
    array (
      'form' => 
      array (
        'rules' => 
        array (
          'app_name' => 'required|string|max:50',
          'app_url' => 'required|url',
          'database_connection' => 'required|string|max:50',
          'database_hostname' => 'required|string|max:50',
          'database_port' => 'required|numeric',
          'database_name' => 'required|string|max:50',
          'database_username' => 'required|string|max:50',
          'mail_driver' => 'required|string|max:50',
          'mail_host' => 'required|string|max:50',
          'mail_port' => 'required|string|max:50',
          'mail_username' => 'required|string|max:50',
          'mail_password' => 'required|string|max:50',
          'mail_encryption' => 'required|string|max:50',
        ),
      ),
    ),
    'installed' => 
    array (
      'redirectOptions' => 
      array (
        'route' => 
        array (
          'name' => 'index',
          'data' => 
          array (
          ),
        ),
        'abort' => 
        array (
          'type' => '404',
        ),
        'dump' => 
        array (
          'data' => 'Dumping a not found message.',
        ),
      ),
    ),
    'installedAlreadyAction' => '',
    'updaterEnabled' => 'false',
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/var/www/vhosts/bonn.mfa.af/amoas/storage/logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/var/www/vhosts/bonn.mfa.af/amoas/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 7,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
    ),
  ),
  'mail' => 
  array (
    'driver' => 'sendmail',
    'host' => 'smtp.gmail.com',
    'port' => '587',
    'from' => 
    array (
      'address' => 'noreply@amoas.mfa.af',
      'name' => 'AMOAS Afghanistan missions Online Appointment System',
    ),
    'encryption' => 'tls',
    'username' => 'noreply@amoas.mfa.af',
    'password' => '8]VoR{{U,Bk+',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/var/www/vhosts/bonn.mfa.af/amoas/resources/views/vendor/mail',
      ),
    ),
    'stream' => 
    array (
      'ssl' => 
      array (
        'allow_self_signed' => true,
        'verify_peer' => false,
        'verify_peer_name' => false,
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 60,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'App\\User',
      'key' => NULL,
      'secret' => NULL,
    ),
    'google' => 
    array (
      'client_id' => '797363960202-e7nkf3hnjcgn9u0ob29ni6h6aqji8uub.apps.googleusercontent.com',
      'client_secret' => '4euHvFY_lZ4L0QbeLhaB6mSM',
      'redirect' => 'https://bonn.mfa.af/amoas/login/google/callback',
    ),
    'facebook' => 
    array (
      'client_id' => '798052390646835',
      'client_secret' => '9ab8e3498d694eaf74562420ac53c5d6',
      'redirect' => 'https://bonn.mfa.af/amoas/login/facebook/callback',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => true,
    'files' => '/var/www/vhosts/bonn.mfa.af/amoas/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'amoas_afghanistan_missions_online_appointment_system_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/var/www/vhosts/bonn.mfa.af/amoas/resources/views',
    ),
    'compiled' => '/var/www/vhosts/bonn.mfa.af/amoas/storage/framework/views',
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'orientation' => 'portrait',
    'defines' => 
    array (
      'font_dir' => '/var/www/vhosts/bonn.mfa.af/amoas/storage/fonts/',
      'font_cache' => '/var/www/vhosts/bonn.mfa.af/amoas/storage/fonts/',
      'temp_dir' => '/tmp',
      'chroot' => '/var/www/vhosts/bonn.mfa.af/amoas',
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => true,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => false,
    ),
  ),
  'datatables' => 
  array (
    'search' => 
    array (
      'smart' => true,
      'multi_term' => true,
      'case_insensitive' => true,
      'use_wildcards' => false,
      'starts_with' => false,
    ),
    'index_column' => 'DT_RowIndex',
    'engines' => 
    array (
      'eloquent' => 'Yajra\\DataTables\\EloquentDataTable',
      'query' => 'Yajra\\DataTables\\QueryDataTable',
      'collection' => 'Yajra\\DataTables\\CollectionDataTable',
      'resource' => 'Yajra\\DataTables\\ApiResourceDataTable',
    ),
    'builders' => 
    array (
    ),
    'nulls_last_sql' => ':column :direction NULLS LAST',
    'error' => NULL,
    'columns' => 
    array (
      'excess' => 
      array (
        0 => 'rn',
        1 => 'row_num',
      ),
      'escape' => '*',
      'raw' => 
      array (
        0 => 'action',
      ),
      'blacklist' => 
      array (
        0 => 'password',
        1 => 'remember_token',
      ),
      'whitelist' => '*',
    ),
    'json' => 
    array (
      'header' => 
      array (
      ),
      'options' => 0,
    ),
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 30,
  ),
  'settings' => 
  array (
    'id' => 1,
    'google_maps_api_key' => NULL,
    'google_calendar_id' => NULL,
    'sync_events_to_calendar' => '0',
    'stripe_test_key_pk' => NULL,
    'stripe_test_key_sk' => NULL,
    'stripe_live_key_pk' => NULL,
    'stripe_live_key_sk' => NULL,
    'stripe_enabled' => '0',
    'stripe_sandbox_enabled' => '1',
    'paypal_client_id' => NULL,
    'paypal_client_secret' => NULL,
    'paypal_enabled' => '0',
    'paypal_sandbox_enabled' => '1',
    'days_limit_to_cancel' => '2',
    'allow_to_cancel' => '0',
    'days_limit_to_update' => '2',
    'allow_to_update' => '0',
    'slots_method' => '1',
    'enable_gst' => '0',
    'gst_percentage' => '0.00',
    'business_name' => 'AMOAS',
    'primary_color' => '#2b3b65',
    'secondary_color' => '#2b3b65',
    'default_currency' => 'EUR',
    'contact_email' => 'a.gulistani@mfa.af',
    'contact_number' => '0774141663',
    'facebook_link' => NULL,
    'twitter_link' => NULL,
    'google_plus_link' => NULL,
    'instagram_link' => NULL,
    'pinterest_link' => NULL,
    'freshchat_widget' => NULL,
    'lang' => 'en',
    'created_at' => 
    Illuminate\Support\Carbon::__set_state(array(
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpLocale' => NULL,
       'date' => '2019-08-10 23:46:42.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
    'updated_at' => 
    Illuminate\Support\Carbon::__set_state(array(
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpLocale' => NULL,
       'date' => '2019-12-12 10:42:53.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
    'slot_duration' => '15',
    'offline_payments' => '0',
    'currency_symbol_position' => 'left',
    'thousand_separator' => ',',
    'decimal_separator' => '.',
    'decimal_points' => '2',
    'clock_format' => '12',
    'slots_with_package_duration' => '0',
    'currency_symbol' => '&euro;',
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
