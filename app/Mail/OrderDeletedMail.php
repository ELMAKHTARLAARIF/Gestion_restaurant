<?php

namespace App\Mail;
use Illuminate\Mail\Mailable;

class OrderDeletedMail extends Mailable
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('Your Order Has Been Deleted')
            ->view('Emails.order_deleted');
    }
}