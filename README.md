## About UserManagement-Laravel

UserManagement-Laravel is package for implementing the user management related functionality in 
a laravel application.


##### User Management
- [List All Users](#users-list)
- [Change Account Status](#user-account-status-change)
- [Account Summary Count](#user-account-summary-count)


### <a name="users-list">List All Users</a>
This api end point will be used for listing all the users in the application.
- `limit` is non-required parameter. Value of this parameter decides that number of results to be returned in the response. Default value is as per the application settings
- `page` is non-required parameter. Value of this parameter is used for identifying the current page for the paginated result. Default value is 1
###### API End Point: /api/user_accounts?limit=4&page=1
###### Request Type: GET
###### Response Body
```
{
    "data": [
        {
            "id": 1,
            "name": "John Doe",
            "email": "test@mail.com",
            "verifiedOn": "",
            "status": "pending",
            "createdOn": "2022-12-19 10:23:36"
        },
        {
            "id": 2,
            "name": "John Doe",
            "email": "test2@mail.com",
            "verifiedOn": "",
            "status": "pending",
            "createdOn": "2022-12-19 11:34:26"
        },
        {
            "id": 3,
            "name": "John Doe",
            "email": "test3@mail.com",
            "verifiedOn": "",
            "status": "pending",
            "createdOn": "2022-12-19 11:35:00"
        },
        {
            "id": 4,
            "name": "John Doe",
            "email": "test4@mail.com",
            "verifiedOn": "",
            "status": "pending",
            "createdOn": "2022-12-19 11:35:47"
        }
    ],
    "pagination": {
        "totalResult": 29,
        "count": 4,
        "per_page": 4,
        "current_page": 1,
        "total_pages": 8
    }
}

```
### <a name="user-account-status-change">Change Account Status</a>
This api end point will be used for changing the status of the user account.
###### API End Point: /api/user_accounts/status/change
###### Request Type: POST
###### Request Body:
```
{
    "userId": "1",
    "status": "pending"
}

```
###### Response Body
```
{
    "message": "Account status changed successfully"
}
```
### <a name="user-account-summary-count">Account Summary Counts</a>
This api end point will be used for getting the summary of account counts
based on the status.
###### API End Point: /api/user_accounts/summary
###### Request Type: GET
###### Response Body
```
{
    "data": {
        "pending": 20,
        "active": 7,
        "blocked": 1
    }
}
```
