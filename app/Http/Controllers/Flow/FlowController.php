<?php

namespace App\Http\Controllers\Flow;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use DarkGhostHunter\FlowSdk\Flow;

use Auth;
use Session;
use Redirect;

class FlowController extends Controller
{
  
    public $flow;
    public function __construct()
    {
        
      $this->flow = Flow::make('production', [
        'apiKey'    => '7B19A4CF-F041-40C4-9488-4180L75A6AAA',
        'secret'    => '8a8c824cd4550b1ee4d581a1d3404d9d640638b0',
      ]);
      // $this->flow = Flow::make('sandbox', [
      //         'apiKey'    => '367F3C6A-DEB8-46F7-89E5-32CLED2236B9',
      //         'secret'    => '65d9f9656b478aaa7be72267bc33f40747f47c94',
      //     ]);
    
    }

    public function payOrder(Order $order)
    {

          try {
            $paymentResponse = $this->flow->payment()->commit([
                'commerceOrder'     => $order->id,
                'subject'           => 'Membresía',
                'amount'            => $order->amount,
                'email'             => $order->user->email,
                'urlConfirmation'   => 'https://socios.enfloraclub.cl/flow/confirm',
                'urlReturn'         => 'https://socios.enfloraclub.cl/flow/return',
                'optional'          => [
                    'Message' => 'Tu orden esta en proceso!'
                ]
            ]);
          }
          catch ( Exception $e) {
              return Redirect::back()->withErrors(array('flow' => $e->getMessage()));
          }

      $order->flow_url = $paymentResponse->getUrl();
      $order->save();
      return Redirect::back();
    }



    
}
