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

How to encode 'service_uid'
--------------------------
When you are trying to  find an user you could identificate this by his id or his service_uid (commonly is the email), when you use the service_uid you must encode this in Base64 en the result encode as url safe, for example if you need to do this in php:

```php
$service_uid = 'example@email.com';
$encoded_uid = urlencode(base64_encode($service_uid));
$url = 'https://admin.woowup.com/apiv3/users/'.$encoded_uid.'/exists';
```

Endpoints
---------

## Users
### GET /users
### GET /users/{id}
Return an user by id or service_uid

| Parameter      | Type | Required  | Description   |
| ------ | ------ | ------ | ------ |
| id | uri |  Yes | User ID or encoded service_uid |

#### Response

```
{
    "payload": {
        "userapp_id": 2207258,
        "user_id": 2192714,
        "app_id": 123,
        "service_uid": "user_2192714@email.com",
        "email": "user_2192714@email.com",
        "first_name": "first name",
        "last_name": "last name",
        "points": 50,
        "customform": {
            "dni": "123456789"
        }
    },
    "message":"ok",
    "code":"ok",
    "time":"100ms"
}
```

### GET /users/{id}/exist

Test if an user exist by id.

| Parameter      | Type | Required  | Description   |
| ------ | ------ | ------ | ------ |
| id | uri |  Yes | User ID or encoded service_uid |

#### Response

```
{
    "payload": {
        "exist": true
    },
    "message":"ok",
    "code":"ok",
    "time":"100ms"
}
```

### GET /user/{id}/belongsToSegment

Test if an user belongs to a segment.

| Parameter      | Type | Required  | Description   |
| ------ | ------ | ------ | ------ |
| id | uri |  Yes | User ID or encoded service_uid |

#### Response

```
{
    "payload": {
        "belongsToSegment": true
    },
    "message":"ok",
    "code":"ok",
    "time":"100ms"
}
```

### PUT /users/{id}
not implemented yet
### DELETE /users/{id}
not implemented yet
### POST /users/register

Register a new user into WoowUp

| Parameter      | Type | Required  | Description   |
| ------ | ------ | ------ | ------ |
| id | query |  Yes | User ID or encoded service_uid |

### POST /users/newsletter
Create a user from newsletter and set a 'newsletter' tag

| Parameter      | Type | Required  | Description   |
| ------ | ------ | ------ | ------ |
| service_uid | query |  Yes | service_uid |
| email | query |  Yes | User's email |

## Benefits
### GET /benefits
### GET /benefits/{id}
### PUT /benefits/{id}
### POST /benefits/{id}/assign
### DELETE /benefits/{id}
### POST /benefits

## Transactions
### GET /transactions

## Purchases
### GET /purchases
### GET /purchases/{id}
### PUT /purchases/{id}
### DELETE /purchases/{id}
### POST /purchases

## Mailing
### GET /mailings
### GET /mailings/{id}
### PUT /mailings/{id}
### DELETE /mailings/{id}
### POST /mailings

## Mailing Folders
### GET /mailingfolders
### GET /mailingfolders/{id}
### PUT /mailingfolders/{id}
### DELETE /mailingfolders/{id}
### POST /mailingfolders