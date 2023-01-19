<?php
namespace ParthShukla\UserManagement\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * UserAccountCollection
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class UserAccountCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($data) {
                return [
                    'id' => $data->id,
                    'name' => $data->name,
                    'email' => empty($data->email) ? "" : $data->email,
                    'verifiedOn' => empty($data->email_verified_at) ? "" : $data->email_verified_at->format('Y-m-d H:i:s'),
                    'status' => $data->status,
                    'createdOn' => $data->created_at->format('Y-m-d H:i:s')
                ];
            }),
            'pagination' => [
                'totalResult' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage()
            ]
        ];
    }
}
// end of class UserAccountCollection
// end of file UserAccountCollection.php
