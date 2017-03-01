WoowUp API V3
=============


Authentication
--------------
In any call to the API you must sent the apikey in the query string as a parameter. For example


So, for example, if your apikey is 'abcdefghijklmnopqrstuvwxyz', you should do a request to

`https://admin.woowup.com/apiv3/users?apikey=abcdefghijklmnopqrstuvwxyz`

Other method, and the recomemded, is via Authentication Header, in every call you must send the header

`Authorization: Basic abcdefghijklmnopqrstuvwxyz`

Pagination
----------

When you are doing a search, we paginate the results. In all paginated endpoints the pagination's parameters are:

| Parameter      | Description  | Default   |
| ------ | ------ | ------ |
| limit | Items per page returned. Max: 100 | 25 |
| page | Number of the page. First page is 0 | 0 |

Returned format
---------------

All endpoints return data in json format, with the `Content-Type: application/json` header. For a correct use you have to send in all the requests the header `Accept: application/json`.


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
Search users by criteria

| Parameter      | Type | Required  | Description   |
| ------ | ------ | ------ | ------ |
| limit | query |  No | Items per page returned. Default 25, max 100 |
| page | query |  No | Number of page. First page is 0 |
| include | query |  No | Filter's definition in json format. |
| exclude | query |  No | Filter's definition in json format. |
| search | query |  No | Free text to find in email, first name, last name, uid, etc. |

#### Response

```
{
    "payload": [{
      "userapp_id": 1111111,
      "user_id": 222222,
      "app_id": 123,
      "service_uid": "user1@email.com",
      "email": "user1@email.com",
      "first_name": "Juan Miguel",
      "last_name": "Velez",
      "tags": ['tag1', 'tag2'],
      "points": 494,
      "customform": [
        
      ]
    },
    {
      "userapp_id": 333333,
      "user_id": 444444,
      "app_id": 123,
      "service_uid": "user2@email.com",
      "email": "user2@email.com",
      "first_name": "santiago",
      "last_name": "carbajal",
      "tags": null,
      "points": 0,
      "customform": [
        
      ]
    }],
    "message":"ok",
    "code":"ok",
    "time":"100ms"
}
```

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

Update an existing user

| Parameter      | Required | Details                                                                                      |
| ------ | ------ | ------ |
| email | Yes | Email |
| first_name | No | Name |
| last_name | No | Last Name |
| gender | No | F or M |


#### Response

```json
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

### DELETE /users/{id}
not implemented yet

### POST /users/register

Returns new registered user data.

| Parameter      | Required | Details                                                                                      |
| ------ | ------ | ------ |
| service_uid | Yes | User ID. By default is email but you can choose other (internal ID, phone, CPF / DNI / RUT / SSN) |
| pass | Yes | User password to login into the program |
| email | Yes | Email |
| first_name | Yes | Name |
| last_name | Yes | Last Name |


#### Response

```json
{
  "payload":{
    "userapp_id": 12345,
    "user_id": 12345,
    "app_id": 123,
    "service_uid": "1122334455",
    "email": "user@example.com",
    "first_name": "firstname",
    "last_name": "lastname",
    "points": 50,
    "customform": {
      "cedula": "11223344"
    }
  },
  "message":"ok",
  "code":"ok",
  "time":"100ms"
}
```



### POST /users/newsletter
Create a user from newsletter and set a 'newsletter' tag

| Parameter      | Type | Required  | Description   |
| ------ | ------ | ------ | ------ |
| service_uid | query |  Yes | service_uid |
| email | query |  Yes | User's email |

### POST /users/{id}/members
Add family members to an user

| Parameter      | Type | Required  | Description   |
| ------ | ------ | ------ | ------ |
| id | uri |  Yes | User ID or encoded service_uid |

#### JSON Request Format
```json
[
    {
        "relationship": "parent|grandparent|son|friend|sibling|espose",
        "first_name": "John",
        "last_name": "Doe",
        "email": "john@doe.com",
        "uid": "john@doe.com",
        "telephone": "123456789",
        "gender": "F|M",
        "birthdate": "YYYY-MM-DD",
        "address": "Av. Evergreen 123"
    }
]
```

#### Response

```json
{
  "payload": {},
  "message": "ok",
  "code": "ok",
  "time": "100ms"
}
```

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