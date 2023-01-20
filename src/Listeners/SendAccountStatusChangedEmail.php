<?php
namespace ParthShukla\UserManagement\Listeners;

use Illuminate\Support\Facades\Mail;
use ParthShukla\UserManagement\Mail\AccountStatusChanged;

/**
 * SendAccountStatusChangedEmail class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class SendAccountStatusChangedEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->user->email)->send(new AccountStatusChanged($event->user, $event->newStatus));
    }
}
// end of class SendAccountStatusChangedEmail
// end of file SendAccountStatusChangedEmail.php
