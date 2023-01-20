<?php
namespace ParthShukla\UserManagement\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * UserAccountStatusUpdated class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class UserAccountStatusUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Instance of User
     *
     * @var User
     */
    public $user;

    /**
     * New status
     * @var string
     */
    public $newStatus;

    //-------------------------------------------------------------------------

    /**
     * Create a new Event instance
     *
     * @param User $user
     * @param string $newStatus
     */
    public function __construct(User $user, string $newStatus)
    {
        $this->user = $user;
        $this->newStatus = $newStatus;
    }

    //-------------------------------------------------------------------------

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
// end of class UserAccountStatusUpdated
// end of file UserAccountStatusUpdated.php
