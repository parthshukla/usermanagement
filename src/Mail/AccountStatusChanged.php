<?php
namespace ParthShukla\UserManagement\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * AccountStatusChanged class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class AccountStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Instance of User
     *
     * @var User
     */
    public $user;

    /**
     * Updated status of the user
     *
     * @var string
     */
    public $newStatus;

    //-------------------------------------------------------------------------

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, string $newStatus)
    {
        $this->user = $user;
        $this->newStatus = $newStatus;
    }

    //-------------------------------------------------------------------------

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('ps-usrmgmt::emails.user_accounts.status_changed');
    }
}
// end of class AccountStatusChanged
// end of file AccountStatusChanged.php
