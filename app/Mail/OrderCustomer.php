<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Bill;

class OrderCustomer extends Mailable
{
    use Queueable, SerializesModels;
    protected $bill;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Bill $bill)
    {
        $this->bill = $bill;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bach.trung.kien@framgia.com')->view('mails.order_customer', ['bill' => $this->bill]);
    }
}
