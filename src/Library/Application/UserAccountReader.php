<?php

namespace ParthShukla\UserManagement\Library\Application;

use App\Models\User;
use ParthShukla\UserManagement\Http\Resources\UserAccountCollection;

/**
 * UserAccountReader
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class UserAccountReader
{

    /**
     * Instance of User
     *
     * @var User
     */
    protected $user;

    //-------------------------------------------------------------------------

    /**
     * Constructor
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    //-------------------------------------------------------------------------

    /**
     * Reads and returns all the user accounts in paginated format
     *
     * @return UserAccountCollection
     */
    public function getAll()
    {
        $pageLimit = (request()->has('limit') && request('limit') > 0) ?
            request('limit'): config('ps-usrmgmt.perPageResultLimit');
        return new UserAccountCollection($this->user->paginate($pageLimit));
    }
}
// end of class UserAccountReader
// end of file UserAccountReader.php
