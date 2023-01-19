<?php
namespace ParthShukla\UserManagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * UserAccountChangeStatusRequest
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class UserAccountChangeStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    //-------------------------------------------------------------------------

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'userId' => 'required|exists:users,id',
            'status' => 'required|in:active,blocked,pending'
        ];
    }
}
// end of class UserAccountChangeStatusRequest
// end of file UserAccountChangeStatusRequest.php
