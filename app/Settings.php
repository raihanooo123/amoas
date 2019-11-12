<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'id',
        'google_maps_api_key',
        'google_calendar_id',
        'sync_events_to_calendar',
        'stripe_test_key_pk',
        'stripe_test_key_sk',
        'stripe_live_key_pk',
        'stripe_live_key_sk',
        'stripe_enabled',
        'stripe_sandbox_enabled',
        'paypal_client_id',
        'paypal_client_secret',
        'paypal_enabled',
        'paypal_sandbox_enabled',
        'days_limit_to_cancel',
        'allow_to_cancel',
        'days_limit_to_update',
        'allow_to_update',
        'slots_method',
        'slot_duration',
        'offline_payments',
        'enable_gst',
        'gst_percentage',
        'business_name',
        'business_logo',
        'primary_color',
        'secondary_color',
        'default_currency',
        'contact_email',
        'contact_number',
        'facebook_link',
        'twitter_link',
        'google_plus_link',
        'instagram_link',
        'pinterest_link',
        'freshchat_widget',
        'lang',
        'currency_symbol_position',
        'thousand_separator',
        'decimal_separator',
        'decimal_points',
        'clock_format',
        'slots_with_package_duration',
    ];

}
