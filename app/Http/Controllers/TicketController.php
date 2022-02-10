<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TicketController extends Controller
{
    public function indexData(Request $request) {
        $fromTicket = $request->get('from');
        $toTicket = $request->get('to');
        $client = new \GuzzleHttp\Client();
        $params = [
            'query' => [
                'from' => $fromTicket,
                'to' => $toTicket
            ]
        ];
        $request = $client->get('192.168.43.79:8001/api/ticket/list-get', $params);
        $response = $request->getBody()->getContents();
        return response()->json(json_decode($response));
    }

    public function index() {
        try {
            $client = new \GuzzleHttp\Client();
            $request = $client->get(ENV('APP_URL_API').'ticket/list-get');
            $status = $request->getStatusCode();
            $response = $request->getBody()->getContents();
            if($status == 200){
                return \Illuminate\Support\Facades\View::make('pages.tickets.index', ['ticket' => json_decode($response)]);
            }else{
                // The server responded with some error. You can throw back your exception
                // to the calling function or decide to handle it here

                throw new \Exception('Failed');
            }

        } catch (\GuzzleHttp\Exception\ConnectException $e) {
             //Catch the guzzle connection errors over here.These errors are something
            // like the connection failed or some other network error

            return \Illuminate\Support\Facades\View::make('pages.errors.400');
        }
    }
}
