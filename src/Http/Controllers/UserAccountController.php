<?php

namespace ParthShukla\UserManagement\Http\Controllers;

use Illuminate\Http\Response;
use ParthShukla\UserManagement\Http\Requests\UserAccountChangeStatusRequest;
use ParthShukla\UserManagement\Library\Application\UserAccountReader;
use ParthShukla\UserManagement\Library\Application\UserAccountWriter;

/**
 * UserAccountController
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class UserAccountController extends Controller
{

    /**
     * Instance of UserAccountReader
     *
     * @var UserAccountReader
     */
    protected $userAccountReader;

    /**
     * Instance of UserAccountWriter
     *
     * @var UserAccountWriter
     */
    protected $userAccountWriter;

    //-------------------------------------------------------------------------

    /**
     * Constructor
     *
     * @param UserAccountReader $userAccountReader
     */
    public function __construct(UserAccountReader $userAccountReader, UserAccountWriter $userAccountWriter)
    {
        $this->userAccountReader = $userAccountReader;
        $this->userAccountWriter = $userAccountWriter;
    }

    //-------------------------------------------------------------------------

    /**
     * Handles request for listing all the user accounts
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function index()
    {
        return response($this->userAccountReader->getAll(), Response::HTTP_OK);
    }

    //-------------------------------------------------------------------------

    /**
     * Handles request for updating status of a user account
     *
     * @param UserAccountChangeStatusRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function changeStatus(UserAccountChangeStatusRequest $request)
    {
        if($this->userAccountWriter->updateAccountStatus($request->validated()))
        {
            return response(['message' => __('ps-usrmgmt::general.account_status_change_success')],
                Response::HTTP_OK);
        }
        return response(["message" => __('ps-usrmgmt::general.server_error')],
            Response::HTTP_INTERNAL_SERVER_ERROR);
    }

}
// end of class UserAccountController
// end of file UserAccountController.php
