<?php

namespace ParthShukla\UserManagement\Http\Controllers;

use Illuminate\Http\Response;
use ParthShukla\UserManagement\Library\Application\UserAccountReader;

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
     * Handles request for listing all the user accounts
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function index()
    {
        return response($this->userAccountReader->getAll(), Response::HTTP_OK);
    }

}
// end of class UserAccountController
// end of file UserAccountController.php
