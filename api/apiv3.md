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

#### Example
```bash
curl -X GET \
    -H "Accept: application/json" \
    -H "Authorization: Basic xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" \
    -H "Content-Type: application/x-www-form-urlencoded" \
    -H "Cache-Control: no-cache" \
    "https://admin.woowup.com/apiv3/users/123456"
```

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
        "telephone": "+1 123 4567 890",
        "birthday": "1989-06-22",
        "gender": "M",
        "points": 50,
        "points_pending": 12,
        "customform": {
            "dni": "123456789"
        },
        "club_inscription_date": "2017-01-22 18:26:16",
        "blocked": false,
        "notes": "is a good customer",
        "mailing_enabled": true,
        "mailing_enabled_reason": null
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

#### Example
```bash
curl -X GET \
    -H "Accept: application/json" \
    -H "Authorization: Basic xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" \
    -H "Content-Type: application/x-www-form-urlencoded" \
    -H "Cache-Control: no-cache" \
    "https://admin.woowup.com/apiv3/users/12345/exist"
```

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
| service_uid | No | User identificator |
| email | No | Email |
| first_name | No | Name |
| last_name | No | Last Name |
| gender | No | F or M |


#### Example

```bash
curl -X PUT \
    -H "Accept: application/json" \
    -H "Authorization: Basic xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" \
    -H "Content-Type: application/json" \
    -H "Cache-Control: no-cache" \
    -d '{"email": "test@gmail2.com", "service_uid": "test@gmail2.com", "gender": "F"}' "https://admin.woowup.com/apiv3/users/12345"
```

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

### POST /users

Create an user

| Parameter      | Required | Details                                                                                      |
| ------ | ------ | ------ |
| service_uid | Yes | User ID. By default is email but you can choose other (internal ID, phone, CPF / DNI / RUT / SSN) |
| email | Yes | Email |
| first_name | No | Name |
| last_name | No |  |
| telephone | No |  |
| birthdate | No | Format: yyyy-mm-dd |
| gender | No | Must be F or M |
| tags | No | Comma separated tags, ex: tag1,tag2,tag3 |
| state | No |  |
| street | No |  |
| country | No |  |
| postcode | No |  |


#### Example
```bash
curl -X POST \
    -H "Accept: application/json" \
    -H "Authorization: Basic xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" \
    -H "Content-Type: application/x-www-form-urlencoded" \
    -H "Cache-Control: no-cache" \
    -d 'service_uid=test@email.com&email=test@email.com' "https://admin.woowup.com/apiv3/users"
```

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
    "customform": {},
    "club_inscription_date": null
  },
  "message":"ok",
  "code":"ok",
  "time":"100ms"
}
```

### POST /users/register

Create and register a new user into loyalty club

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

### POST /users/{id}/points
Add/substract points to user

| Parameter | Required  | Description   |
| ------ | ------ | ------ |
| concept |  Yes | Concept why you are adding points to user. Must be: purchase, gift, survey_response, register or referrer |
| points |  Yes | Points to be added (could be less than zero) |
| description | Yes | Description why you are adding points to user |

#### JSON Request Format
```json
    {
        "concept": "purchase|gift|survey_response|register|referrer",
        "points": "integer",
        "description": "string"
    }
```

#### Example
```bash
curl -X POST \
    -H "Accept: application/json" \
    -H "Authorization: Basic xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" \
    -H "Content-Type: application/json" \
    -H "Cache-Control: no-cache" \
    -d '{"concept": "gift", "points": "2123", "description": "test"}' "https://admin.woowup.com/apiv3/users/123456/points"
```

#### Response

```json
{
  "payload": {
    "transaction_id": 12345
  },
  "message": "ok",
  "code": "ok",
  "time": "100ms"
}
```

## Benefits
### GET /benefits
Retrieve a list of benefits separated by status

| Parameter      | Type | Required  | Description   |
| ------ | ------ | ------ | ------ |
| currentbenefits | query |  No | Amount of benefit returned |
| outofstockbenefits | query |  No | Amount of benefits out of stock returned |
| comingbenefits | query |  No | Amount of coming benefits returned |

#### Response

```
{
  "payload": {
    "current": [
      {
        "id": 123,
        "slug": "cupon-prueba",
        "title": "CUPON PRUEBA",
        "description": "V&aacute;lido por 2 (dos) entradas (Campo) para el recital\r\n",
        "status": "1",
        "image_id": "13321",
        "user_id": "1418",
        "app_id": "123",
        "app_code": "CONTEST",
        "contenttype_id": "10",
        "version": null,
        "category_id": null,
        "startdate": "2017-03-24 00:00:00",
        "enddate": "2017-12-31 09:30:26",
        "featured": "0",
        "wallpublish": "0",
        "monthly_redeems": "3",
        "modified": "2017-03-21 19:37:25",
        "created": "2017-02-22 18:49:17",
        "image_url": "https://admin.woowup.com/uploads/1234567/qwerty-adfg-zcv-iuytr-vbnmjhgfd.png",
        "points": 0
      }
    ],
    "outofstock": [
      {
        "id": 124,
        "slug": "cupon-prueba",
        "title": "CUPON PRUEBA",
        "description": "V&aacute;lido por 2 (dos) entradas (Campo) para el recital\r\n",
        "status": "1",
        "image_id": "13321",
        "user_id": "1418",
        "app_id": "123",
        "app_code": "CONTEST",
        "contenttype_id": "10",
        "version": null,
        "category_id": null,
        "startdate": "2017-03-24 00:00:00",
        "enddate": "2017-12-31 09:30:26",
        "featured": "0",
        "wallpublish": "0",
        "monthly_redeems": "3",
        "modified": "2017-03-21 19:37:25",
        "created": "2017-02-22 18:49:17",
        "image_url": "https://admin.woowup.com/uploads/1234567/qwerty-adfg-zcv-iuytr-vbnmjhgfd.png",
        "points": 0
      }
    ],
    "comingbenefits": [
      {
        "id": 125,
        "slug": "cupon-prueba",
        "title": "CUPON PRUEBA",
        "description": "V&aacute;lido por 2 (dos) entradas (Campo) para el recital\r\n",
        "status": "1",
        "image_id": "13321",
        "user_id": "1418",
        "app_id": "123",
        "app_code": "CONTEST",
        "contenttype_id": "10",
        "version": null,
        "category_id": null,
        "startdate": "2017-03-24 00:00:00",
        "enddate": "2017-12-31 09:30:26",
        "featured": "0",
        "wallpublish": "0",
        "monthly_redeems": "3",
        "modified": "2017-03-21 19:37:25",
        "created": "2017-02-22 18:49:17",
        "image_url": "https://admin.woowup.com/uploads/1234567/qwerty-adfg-zcv-iuytr-vbnmjhgfd.png",
        "points": 0
      }
    ]
  },
  "message": "",
  "code": "ok",
  "time": "36ms"
}
```

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
Create a new purchase

#### Request content format
```
{
  "service_uid": "required|string",
  "points": "integer|default:0",
  "invoice_number": "required|string",
  "purchase_detail": [
    {
      "sku": "required|string",
      "product_name": "required|string",
      "quantity": "required|integer|min:0",
      "unit_price": "required|float",
      "variations": [  list|default:[]
        {
          "name": "required|string",
          "value": "required|string"
        }
      ]
    }
  ],
  "prices": {
    "cost": float|default:0,
    "shipping": float|default:0,
    "gross": float|default:0,
    "tax": float|default:0,
    "discount": float|default:0,
    "total": float|default:0
  },
  "branch_name": "string"
  "createtime": "string|format:yyyy-mm-dd hh:mm:ss|default:current_time"
}
```

#### Example
```json
{
  "service_uid": "customer@email.com",
  "points": 24,
  "invoice_number": "FAC-000085643",
  "purchase_detail": [
    {
      "sku": "2907362",
      "product_name": "Heladera Patrick",
      "quantity": 1,
      "unit_price": 1999.00,
      "variations": [
        {
          "name": "Talle",
          "value": "XL"
        }
      ]
    }
  ],
  "prices": {
    "cost": 123.00,
    "shipping": 123.00,
    "gross": 123.00,
    "tax": 123.00,
    "discount": 123.00,
    "total": 123.00
  },
  "branch_name": "Palermo I",
  "createtime": "2017-03-23 14:35:22"
}
```

```bash
curl -X POST \
  https://admin.woowup.com/apiv3/purchases \
  -H 'accept: application/json' \
  -H 'authorization: Basic xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' \
  -H 'cache-control: no-cache' \
  -d '{
  "service_uid": "test@example.com",
  "points": 24,
  "invoice_number": "FAC-123456789",
  "purchase_detail": [
    {
      "sku": "12345",
      "product_name": "Heladera Patrick",
      "quantity": 1,
      "unit_price": 1999.00,
      "variations": [
        {
          "name": "Litros",
          "value": "200"
        }
      ]
    }
  ],
  "prices": {
    "cost": 123.00,
    "shipping": 123.00,
    "gross": 123.00,
    "tax": 123.00,
    "discount": 123.00,
    "total": 123.00
  },
  "branch_name": "Palermo I",
  "createtime": "2017-03-23 14:35:22"
}'
```

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