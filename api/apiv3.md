WoowUp API V3
=============

Authentication
--------------
In any call to the API you must sent the apikey in the query string as a parameter. For examp


So, for example, if your apikey is 'abcdefghijklmnopqrstuvwxyz', you should do a request to

`https://admin.woowup.com/apiv3/users?apikey=abcdefghijklmnopqrstuvwxyz`

Pagination
----------

When you are doing a search, we paginate the results. In all paginated endpoints the pagination's parameters are:

| Parameter      | Description  | Default   |
| ------ | ------ | ------ |
| limit | Items per page returned. Max: 100 | 25 |
| page | Number of the page. First page is 0 | 0 |

Endpoints
---------

## Users
### GET /users
### GET /user/{id}
### GET /user
Return an user by service_uid

| Parameter      | Required  | Description   |
| ------ | ------ | ------ |
| service_uid | Yes | User service_uid |


### GET /user/{id}/exist

Test if an user exist by id.

### GET /user/exist

Test if an user exist by service_uid.

| Parameter      | Required  | Description   |
| ------ | ------ | ------ |
| service_uid | Yes | User service_uid |

### GET /user/{id}/belongsToSegment

Test if an user belongs to a segment.

| Parameter      | Required  | Description   |
| ------ | ------ | ------ |
| segment_id | Yes | Segment id |

### PUT /user/{id}
### PUT /user
### DELETE /user/{id}
### POST /user

## Benefits
### GET /benefits
### GET /benefit/{id}
### PUT /benefit/{id}
### POST /benefit/{id}/assign
### DELETE /benefit/{id}
### POST /benefit

## Transactions
### GET /transactions

## Purchases
### GET /purchases
### GET /purchase/{id}
### PUT /purchase/{id}
### DELETE /purchase/{id}
### POST /purchase

## Mailing
### GET /mailings
### GET /mailing/{id}
### PUT /mailing/{id}
### DELETE /mailing/{id}
### POST /mailing

## Mailing Folders
### GET /mailingfolders
### GET /mailingfolder/{id}
### PUT /mailingfolder/{id}
### DELETE /mailingfolder/{id}
### POST /mailingfolder