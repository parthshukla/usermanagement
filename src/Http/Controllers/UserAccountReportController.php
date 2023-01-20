<?php

namespace ParthShukla\UserManagement\Http\Controllers;

use Illuminate\Http\Response;
use ParthShukla\UserManagement\Library\Application\UserAccountReader;

/**
 * UserAccountReportController class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class UserAccountReportController extends Controller
{

    /**
     * Instance of UserAccountReader
     *
     * @var UserAccountReader
     */
    protected $userAccountReader;

    //-------------------------------------------------------------------------

    /**
     * Constructor
     *
     * @param UserAccountReader $userAccountReader
     */
    public function __construct(UserAccountReader $userAccountReader)
    {
        $this->userAccountReader = $userAccountReader;
    }

    //-------------------------------------------------------------------------

    /**
     * Handle requests for showing account summary
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function summaryReport()
    {
        return response(['data' => $this->userAccountReader->getUserAccountSummary()],
            Response::HTTP_OK);
    }

}
// end of class UserAccountController
// end of file UserAccountController.php
