<?php

namespace ParthShukla\UserManagement\Library\Application;

use App\Models\User;

/**
 * UserAccountWriter
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class UserAccountWriter
{

    /**
     * Instance of User
     *
     * @var User
     */
    protected $user;

    //-------------------------------------------------------------------------

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    //-------------------------------------------------------------------------

    /**
     * Updates the status of the user account
     *
     * @param array $data
     * @return bool
     */
    public function updateAccountStatus(array $data) :bool
    {
        //getting the user
        $user = $this->user->findOrFail($data['userId']);

        //updating the status
        $user->status = $data['status'];
        return $user->save();
    }

}
// end of class UserAccountWriter
// end of file UserAccountWriter.php
