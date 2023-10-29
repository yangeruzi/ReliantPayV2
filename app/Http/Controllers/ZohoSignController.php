<?php

namespace App\Http\Controllers;

use App\Models\SaleBooking;
use App\Models\ZohoAccessToken;
use App\Service\ZohoTokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use zsign\OAuth;

class ZohoSignController extends Controller
{
    protected $zohoTokenService;
    public function __construct(ZohoTokenService $zohoTokenService)
    {
        $this->zohoTokenService = $zohoTokenService;
    }
    
    public function index()
    {
        return view('zoho.signin');
    }
    public function signin()
    {
        if(auth()->user()->zohoAccessToken){
            if(auth()->user()->zohoAccessToken->expires_in > time()){
                $url=env('ZOHO_BASE_URL').'/oauth/v2/token?';
                $params=[
                    'refresh_token'=>auth()->user()->zohoAccessToken->refresh_token,
                    'client_id'=>env('ZOHO_CLIENT_ID'),
                    'client_secret'=>env('ZOHO_CLIENT_SECRET'),
                    'grant_type'=>'refresh_token',
                    'scope'=>'ZohoSign.documents.CREATE,ZohoSign.documents.READ,ZohoSign.documents.UPDATE,ZohoSign.documents.DELETE,ZohoSign.documents.all'
                ];
                $url.=http_build_query($params);
                $response=Http::post($url);
                $response=json_decode($response->body(),true);
                $access_token=$response['access_token'];
                $expires_in=$response['expires_in']+time();
                $this->saveToken($access_token,auth()->user()->zohoAccessToken->refresh_token,$expires_in);
                return redirect()->route('zoho');
            }
        }
        $url = env('ZOHO_BASE_URL').'/oauth/v2/auth?';
        $params = [
            'scope' => 'ZohoSign.documents.CREATE,ZohoSign.documents.READ,ZohoSign.documents.UPDATE,ZohoSign.documents.DELETE,ZohoSign.documents.all',
            'client_id' => env('ZOHO_CLIENT_ID'),
            'response_type' => 'code',
            'redirect_uri' => route('zohoCallback'),
            'access_type' => 'offline',
            'prompt' => 'consent'

        ];
        $url .= http_build_query($params);
        return redirect($url);
    }
    public function callback(Request $request)
    {
        if ($request->has('code')) {
            $code = $request->code;
            $url = env('ZOHO_BASE_URL').'/oauth/v2/token?';
            $params = [
                'code' => $code,
                'client_id' => env('ZOHO_CLIENT_ID'),
                'client_secret' => env('ZOHO_CLIENT_SECRET'),
                'redirect_uri' => route('zohoCallback'),
                'grant_type' => 'authorization_code',
                'scope' => 'ZohoSign.documents.CREATE,ZohoSign.documents.READ,ZohoSign.documents.UPDATE,ZohoSign.documents.DELETE,ZohoSign.documents.all'
            ];
            $url .= http_build_query($params);
            $response = Http::post($url);
            $response = json_decode($response->body(), true);
            $access_token = $response['access_token'];
            $refresh_token = $response['refresh_token'];
            $expires_in = time() + $response['expires_in'];
            $this->saveToken($access_token, $refresh_token, $expires_in);
            return redirect()->route('zoho');
        }
    }
    private function saveToken($access_token, $refresh_token, $expires_in)
    {
        $token = ZohoAccessToken::where('user_id', auth()->user()->id)->first();
        if ($token) {
            $token->access_token = $access_token;
            $token->refresh_token = $refresh_token;
            $token->expires_in = $expires_in;
            $token->save();
        } else {
            $token = new ZohoAccessToken();
            $token->user_id = auth()->user()->id;
            $token->access_token = $access_token;
            $token->refresh_token = $refresh_token;
            $token->expires_in = $expires_in;
            $token->save();
        }
    }
    public function sendAuthorizationLetter(){
        // $saleBooking=SaleBooking::find($id);
        $token=$this->zohoTokenService->checkTokenValidityAndReturnAccessToken();
        $url=env('ZOHO_SIGN_BASE_URL').'/api/v1/requesttypes';
        $header=[
            'Authorization'=>'Zoho-oauthtoken '.$token,
        ];
        Log::info($header);
        // $response=Http::withHeaders($header)->get($url);
        // $response=json_decode($response->body(),true);
        $bodydata=[
            'request_type_name'=>'Authorization Letter',
            'request_type_description'=>'Authorization Letter',
           
        ];
       $response= Http::withHeaders($header)->get($url);
       Log::info($response->status());
        Log::info($response);



    }

}
