<?php

namespace App\Mail;
use Auth;
use App\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderReceipt extends Mailable
{
    use Queueable, SerializesModels;
    public $submission;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Submission $submission)
    {
        $this->submission = $submission;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(Auth::user()->email, Auth::user()->company)
                    ->from('VoucheryHub@gmail.com')
                    ->subject('Order Receipt')
                    ->markdown('email.orders');

    }
}
