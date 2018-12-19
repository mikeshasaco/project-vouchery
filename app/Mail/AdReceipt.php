<?php

namespace App\Mail;
use Auth;
use App\Advertisement;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdReceipt extends Mailable
{
    use Queueable, SerializesModels;
    public $advertisement;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Advertisement $advertisement)
    {
        $this->advertisement = $advertisement;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(Auth::user()->email)
                    ->from('VoucheryHub@gmail.com')
                    ->subject('Order Receipt')
                    ->markdown('email.receipt');
             }
}
