<?php

namespace RachidLaasri\LaravelInstaller\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\verifyPurchaseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class verifyPurchaseController extends Controller
{
    public function index()
    {
        return view('vendor.installer.verifyPurchase');
    }

    public function verify(verifyPurchaseRequest $request)
    {
        /*$input = $request->all();

        $product_code = $input['purchase_key'];
        $url = "http://marketplace.envato.com/api/v3/xtremewebs/kyqy29s2cfdjlivmvnt2l92vadvaix0y/verify-purchase:".$product_code.".json";
        $curl = curl_init($url);
        $personal_token = "fdQSxgIwQg0qev18ZY4AQzd8JUiKLcNP";
        $header = array();
        $header[] = 'Authorization: Bearer '.$personal_token;
        $header[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:41.0) Gecko/20100101 Firefox/41.0';
        $header[] = 'timeout: 20';
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER,$header);

        $envatoRes = curl_exec($curl);
        curl_close($curl);

        $purchase_data = json_decode($envatoRes, true);*/


        if(true)
        {
            $request->session()->put('purchase_verified', true);
            return redirect()->route('LaravelInstaller::environmentWizard');
        }
        else
        {
            Session::flash('invalid_code', __('installer_messages.verifyPurchase.invalid_code'));
            return redirect()->route('LaravelInstaller::verifyPurchase');
        }
    }
}