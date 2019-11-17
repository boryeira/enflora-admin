<?php

namespace App\Mail\Orders;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPay extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $items;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct($order,$items)
    // {
    //     $this->order = $order;
    //     $this->items = $items;
    // }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('info@enfloraclub.cl')
                  ->view('mails.orders.pay');
    }
}
