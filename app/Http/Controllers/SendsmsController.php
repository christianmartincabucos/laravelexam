<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SendsmsController extends Controller
{
    public function message()
    {
        return view('templates.message.index');
    }
    public function showmessage()
    {
        return view('templates.message.show');
    }

    public function showtoken()
    {
        return view('templates.showtoken');
    }

    public function sendmessage(Request $request)
    {

        $payload = array('outboundSMSMessageRequest' => array(
            'senderAddress'             => $request->sender_address,
            'outboundSMSTextMessage'    => array(
                'message'               => $request->message
            ),
            'address'                   => $request->address
        ));

        $datas = Http::accept('application/json')->post('https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/' . $request->sender_address . '/requests?access_token=' . $request->access_token, $payload)->json();

        return response()->json($datas);
    }
    public function gettoken(Request $request)
    {
        $token = Http::accept('application/json')->post('https://developer.globelabs.com.ph/oauth/access_token?', [

            'app_id'      => $request->app_id,
            'app_secret'  => $request->app_secret,
            'code'        => $request->code,

        ])->json();

        return response()->json($token);
    }
}
