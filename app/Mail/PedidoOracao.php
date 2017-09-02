<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PedidoOracao extends Mailable {

    use Queueable,
        SerializesModels;

    public $order;

    public function __construct(Order $order) {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('emails.pedido-oracao');
    }

}
