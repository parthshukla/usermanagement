<?php

namespace ParthShukla\UserManagement\Library\Application;

use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        $query = $this->user->select('id','name','email','email_verified_at','status',
                                'created_at');

        // search by status
        if(request()->has('status'))
        {
            $query = $query->where('status', request()->input('status'));
        }

        //search by email
        if(request()->has('email'))
        {
            $query = $query->where('email', request()->input('email'));
        }

        // search by name
        if(request()->has('name'))
        {
            $query = $query->where('name', 'like', '%'.request()->input('name').'%');
        }

        $pageLimit = (request()->has('limit') && request('limit') > 0) ?
            request('limit') : config('ps-usrmgmt.perPageResultLimit');
        return new UserAccountCollection($query->paginate($pageLimit));
    }

    //-------------------------------------------------------------------------

    /**
     * Returns the User Account summary.
     *
     * @return mixed[]
     */
    public function getUserAccountSummary()
    {
        $arrResult = ['pending' => 0, 'active' => 0, 'blocked' => 0];

        $result = $this->readUserAccountSummary();

        foreach ($result as $row)
        {
            $arrResult[$row->status] = $row->user_count;
        }

        return $arrResult;

    }

    //-------------------------------------------------------------------------

    /**
     * Reads and returns the user account summary counts based on the account
     * status
     *
     * @return mixed
     */
    protected function readUserAccountSummary()
    {
        return $this->user->groupBy('status')
                ->whereNull('deleted_at')  //excluding the deleted accounts
                ->select(DB::raw('status, count(id) as user_count'))
                ->get();
    }
}
// end of class UserAccountReader
// end of file UserAccountReader.php
