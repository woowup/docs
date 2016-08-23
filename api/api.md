Coupons
======


Endpoints
---------

### POST /coupon_status

WoowUp coupon tracking ends when the coupon is delivered to the user.
You can use this endpoint to extend the tracking and tell WoowUp that a coupon was actually used by the user.

| Parameter      | Required  | Details   |
| ------ | ------ | ------ |
| coupon_id | Yes | Coupon ID |
| status | Yes | 4: Used |


#### POST /coupon_status

`HTTP/1.1 200 OK`

```json
{
  "status":true,
  "data":"Cambio de estado efectuado con exito"
}
```

Transactions
====================

Endpoints
---------

### GET /transactions

Consulta la transaacciones para un usuario.


| Parameter      | Mandatory | Explanation                                                                                      |
| ------ | ------ | ------ |
| userapp_id | Si | Id del usuario en la app |


#### GET /transactions

`HTTP/1.1 200 OK`

```json
...
  {
    "id":"2191",
    "points":"20000",
    "action_id":null,
    "concept_id":"3",
    "description":"342",
    "created":"2014-02-26 14:41:22"
  },
  {
    "id":"2199",
    "points":"20000",
    "action_id":null,
    "concept_id":"3",
    "description":null,
    "created":"2014-02-28 09:58:56"
  },
  {
    "id":"2206",
    "points":"100",
    "action_id":null,
    "concept_id":"6",
    "description":"1127",
    "created":"2013-10-29 14:16:12"
  }
...
```

### GET /contest_sale_points

Get how many points related to sales where given in your Loyalty Program.

#### GET /contest_sale_points

`HTTP/1.1 200 OK`

```json
{
  "status":true,
  "data": {
    "contest_sale_points": 5
  }
}
```


### GET /connectedservices

Get the connected services for this Programm (Magento, TiendaNube, Hubspot, etc).


Points
======


Endpoints
---------


### POST /add_points_by_uid

You can use this endpoint to reward a user with points. Returns transactio id.

|  Parametro | Required | Details  |
| ---------- | ----------- | ------------ |
| app_id | Yes          | Program id |
| userapp_id | Yes          | User id. By default is email |
| points     | Yes          | How many points you want to give. It may be a negative number tu subsctract points |
| concept    | No          | Concept id (complete always with number 3) |
| description | No          | Short text with the concept of the transaction. Ex: “Thanks for being with us for 1 year!” |
| price | No          | Always null |
| branch     | No          | Null or Name of the branch where this transaction happened (the branch must exists)|


#### POST /add_points_by_uid

`HTTP/1.1 200 OK`

```json
{
  "status":true,
  "data":{
    "transaction_id":"2424"
  }
}
```



### POST /add_sale_points_by_uid

Register a Purchase Order and reward the user with points. Returns transaction ID.

| Parameter      | Required | Details                                                                                      |
| ------ | ------ | ------ |
| app_id | Yes          | Program id |
| uid | Yes | User id. By default is email |
| points | Yes | How many points you want to give. It may be a negative number tu subsctract points |
| nrofactura | Yes | Purchase order number |
| factura | No | Purchase order detail. Json format |
| branch     | No          | Null or Name of the branch where this transaction happened (the branch must exists) |
| datetime   | No   | Purchase's date, format: yyyy-mm-dd hh:mm:ss. By default is the current date |


The detail in json format should be like this:
```json
[
  {
    "codigo":"12",
    "producto":"prod1",
    "cantidad":2,
    "precio": 10.3,
    "branch": "branch 1",
    "variations": [
      {"name": "Color", "value": "Rojo"},
      {"name": "Talle", "value": "XS"}
    ]
  },
  {...}
]
```
Where codigo is product code, producto is product name, cantidad is quantity purchased and precio is unit price.

Example:
```shell
curl -H 'Username: xx' -H 'Apikey: xxxx' -H 'Accept: application/json' -d 'uid=john@doe.com&points=100&nrofactura=1234&factura=[{"codigo":"12", "producto":"prod1", "cantidad":2, "precio": 10.3, "variations": [{"name": "Color", "value": "Red"}]},{"codigo":"13", "producto":"prod3", "cantidad":1, "precio": 1.3, "variations": [{"name": "Color", "value": "Green"}]}]'  "https://www.woowup.com/apiv2/13/add_sale_points_by_uid"
```

#### POST /add_sale_points_by_uid

`HTTP/1.1 200 OK`

```json
{
  "status":true,
  "data":{
    "transaction_id":"2424"
  }
}
```

### POST /cancel_invoice

Cancel a Purchase order and reverting the related points previously given to the user.

| Parametro      | Required | Detail        |
| ------ | ------ | ------ |
| app_id | Yes          | Program ID |
| nrofactura | Yes | Purchase order number |

Example:
```shell
curl -H 'Username: xx' -H 'Apikey: xxxx' -H 'Accept: application/json' -d 'nrofactura=1234'  https://www.woowup.com/apiv2/13/cancel_invoice
```

#### POST /cancel_invoice

`HTTP/1.1 200 OK`

```json
{
  "status":true,
  "data":{
    "transaction_id":"2424"
  }
}
```
Registration
======


Endpoints
---------

### POST /register_user_classic

Returns new registered user data.

| Parameter      | Required | Details                                                                                      |
| ------ | ------ | ------ |
| uid | Yes | User ID. By default is email but you can choose other (internal ID, phone, CPF / DNI / RUT / SSN) |
| pass | Yes | User password to login into the program |
| email | Yes | Email |
| first_name | Yes | Name |
| last_name | Yes | Last Name |


#### POST /register_user_classic

`HTTP/1.1 200 OK`

```json
{
  "status":true,
  "data":{
    "user":{
      "service":2,
      "status":1,
      "service_uid":"31824477",
      "service_pass":"81dc9bdb52d04dc20036dbd8313ed055",
      "email":"jhon.doe@hotmil.com",
      "first_name":"John",
      "last_name":"Doe",
      "name":"Juan Doe",
      "createtime":"2014-08-24 11:33:12",
      "id":"9",
      "locale":null,
      "timezone":null,
      "fid":null,
      "useremail":null,
      "gender":null,
      "birthday":null,
      "hometown":null,
      "location":null,
      "country_id":null
    },
    "user_app":{
      "app_code":"CONTEST",
      "showfriendsinviter":1,
      "is_client":0,
      "user_id":"9",
      "app_id":"13",
      "token":null,
      "lastvisit":"2014-08-24 11:33:12",
      "createtime":"2014-08-24 11:33:12",
      "remote_ip":"127.0.0.1",
      "id":"34",
      "contactemail":null,
      "external_id":null
    },
    "points":0
  }
}
```

### POST /initialize_user

Add a new user to the Programm, with its registration pending. The user can earn points but he yet need to register to view his points and redeem a coupon.

| Parameter      | Required | Detail                                                                                      |
| ------ | ------ | ------ |
| uid | Yes | User ID. Default is email |
| email | Yes | Email |
| first_name | Yes | Name |
| last_name | Yes | Last name |


#### POST /initialize_user

`HTTP/1.1 200 OK`

```json
{
  "status":true,
  "data":{
    "user":{
      "service":2,
      "status":1,
      "service_uid":"31824477",
      "service_pass":"81dc9bdb52d04dc20036dbd8313ed055",
      "email":"juan.villca@acctoujours.com",
      "first_name":"Juan",
      "last_name":"Villca",
      "name":"Juan Villca",
      "createtime":"2014-08-24 11:33:12",
      "id":"9",
      "locale":null,
      "timezone":null,
      "fid":null,
      "useremail":null,
      "gender":null,
      "birthday":null,
      "hometown":null,
      "location":null,
      "country_id":null
    },
    "user_app":{
      "app_code":"CONTEST",
      "showfriendsinviter":1,
      "is_client":0,
      "user_id":"9",
      "app_id":"13",
      "token":null,
      "lastvisit":"2014-08-24 11:33:12",
      "createtime":"2014-08-24 11:33:12",
      "remote_ip":"127.0.0.1",
      "id":"34",
      "contactemail":null,
      "external_id":null
    },
    "points":0
  }
}
```


Users
======


Endpoints
---------

### GET /user_by_email

Get user information searching by his email.


| Paramter      | Required | Detail |
| ------ | ------ | ------ |
| email | Yes | Email |


#### GET /user_by_email

`HTTP/1.1 200 OK`

```json
{
  "status":true,
  "data":{
    "user":{
      "points":"4256",
      "name":"John Doe",
      "first_name":"John",
      "last_name":"Doe",
      "email":"john.doe@hotmail.com",
      "locale":"en_GB",
      "timezone":"-3",
      "createtime":"2013-10-22 20:15:17",
      "fid":"1413631099",
      "service":null,
      "service_uid":null,
      "service_pass":null,
      "status":"1",
      "gender":"1",
      "birthday":"1981-11-21",
      "hometown":"Buenos Aires, Argentina",
      "location":"Buenos Aires, Argentina",
      "country_id":"13",
      "userapp_id":"17",
      "app_id":"13"
    }
  }
}
```


### GET /user_by_uid

Retorna la información de un usuario buscando por User ID


| Parámetro      | Obligatorio | Explicación                                                                                      |
| ------ | ------ | ------ |
| uid | Si | User ID |


#### GET /user_by_email

`HTTP/1.1 200 OK`

```json
{
  "status":true,
  "data":{
    "user":{
      "points":"4256",
      "name":"Juan Villca",
      "first_name":"Juan",
      "last_name":"Villca",
      "email":"juan.villca@devellabs.com",
      "locale":"en_GB",
      "timezone":"-3",
      "createtime":"2013-10-22 20:15:17",
      "fid":"1413631099",
      "service":null,
      "service_uid":null,
      "service_pass":null,
      "status":"1",
      "gender":"1",
      "birthday":"1981-11-21",
      "hometown":"Buenos Aires, Argentina",
      "location":"Buenos Aires, Argentina",
      "country_id":"13",
      "userapp_id":"17",
      "app_id":"13"
    }
  }
}
```


### GET /is_user

Retorna la información de un usuario buscando por email


| Parámetro      | Obligatorio | Explicación                                                                                      |
| ------ | ------ | ------ |
| service | Si | 1 es FB, 2 es Classic |
| service_uid | Si | ID del usuario |


#### GET /is_user

`HTTP/1.1 200 OK`

```json
{
  "status":true,
  "message":"User already exists"
}
```

### GET /top_users_by_points

Returns a list of users ordered by points


| Parameter      | Required | Description |
| ------ | ------ | ------ |
| limit | No | Amount of users returned. Default = 10, max 100 |


#### GET /top_users_by_points

`HTTP/1.1 200 OK`

```json
[
  {
    "id": "1234",
    "name": "John Doe",
    "first_name": "John",
    "last_name": "Doe",
    "email": "john@doe.com",
    "locale": "es_LA",
    "timezone": "-3",
    "createtime": "2015-03-06 18:38:26",
    "fid": "000000000",
    "service": "1",
    "service_uid": "john@doe.com",
    "service_pass": "XXXXXXX",
    "status": "1",
    "useremail": null,
    "gender": "0",
    "birthday": "1943-06-11",
    "hometown": null,
    "location": null,
    "country_id": null,
    "tags": null,
    "points": 999
  },
  {
    "id": "1235",
    "name": "Joane Doe",
    "first_name": "Joane",
    "last_name": "Doe",
    "email": "joane@doe.com",
    "locale": "es_LA",
    "timezone": "-3",
    "createtime": "2015-09-04 11:23:54",
    "fid": "00000000",
    "service": "1",
    "service_uid": "joane@doe.com",
    "service_pass": "XXXXXXX",
    "status": "1",
    "useremail": null,
    "gender": "0",
    "birthday": "1987-04-26",
    "hometown": null,
    "location": null,
    "country_id": null,
    "tags": null,
    "points": 998
  },
  ...
]
```

Products and Categories
=========================

### POST /save_product

Create or update (if the code already exists) a product in WoowUp

#### Uri Parameters
| Parameter     | Required  | Description       |
| ------------- | --------- | ----------------- |
| code          | Yes       | Id of the product |
| name          | Yes       | Name of the product |
| category_id   | No        | Id of the category |
| thumbnail_url | No        | Product's thumbnail url |
| image_url     | No        | Product's image url |
| url           | No        | Product's full url in the e-commerce |
| cost          | No        | Production's cost of the product (Ex: 125.50) |

#### Request Example

```shell
curl -X POST -H "Content-Type: application/json" -H "Username: {APP_ID}" -H "Apikey: {API_KEY}" -H "Accept: application/json" -H "Cache-Control: no-cache" \
"https://admin.woowup.com/apiv2/XXX/save_product?code=123&name=soap&category_id=23&thumbnail_url=http://img.com/thumbnail.jpg&image_url=http://img.com/thumbnail.jpg&url=http://my-ecommerce.com/123/soap&cost=15.8"
```

#### Response

`HTTP/1.1 200 OK`

```json
{"status": true, "message": "product updated"}
```

### POST /save_category_tree

Update category tree, if one or more categories doesn't exists will be created.

#### Uri Parameters

Don't have parameters

#### Post Body

This is an example of the json format of the categories

```json
[
  {
    "id": 1,
    "name": "Ropa Mujer",
    "children": [
      {
        "id": 2,
        "name": "Polleras",
        "children": [...]
      },
      {
        "id": 3,
        "name": "Minifaldas",
        "children": null
      }
    ]
  },
  {
    "id": 4,
    "name": "Ropa Hombre",
    "children": [...]
  },
  ...
]
```
#### Request Example

```shell
curl -X POST -H "Content-Type: application/json" -H "Username: {APP_ID}" -H "Apikey: {API_KEY}" -H "Accept: application/json" -H "Cache-Control: no-cache" \
-d "[{"id": 1, "name": "RopaMujer", "children": [{"id": 2, "name": "Polleras", "children": null}, {"id": 3, "name": "Minifaldas", "children": null}]}, {"id": 4, "name": "RopaHombre", "children": null}]" \
"https://admin.woowup.com/apiv2/{APP_ID}/save_category_tree"
```

#### Response

`HTTP/1.1 200 OK`

```json
{"status": true}
```


Send transactional emails
=========================

### POST /send_transactional_email

Send an email to one or more emails. The email data must be sent in the body of the request in json format.

```json
{
  "to":["user1@email.com", "user2@email.com", "user3@email.com", ...],
  "subject": "email subject",
  "body": "email body"
}
```

#### POST /send_transactional_email

`HTTP/1.1 200 OK`

```shell
curl -X POST -H "Content-Type: application/json" -H "Username: {APP_ID}" -H "Apikey: {API_KEY}" -H "Accept: application/json" -H "Cache-Control: no-cache" -d '{
    "to": ["user1@email.com", "user2@email.com"],
    "subject": "email subject",
    "body": "email body"
}' "https://admin.woowup.com/apiv2/XXX/send_transactional_email"
```


Webhooks
===============

## Validar Registro de Usuario

La URL a utilizar debe ingresarse en la sección de __Conecta__ dentro del administrador


### Request
Al registrarse un usuario, se disparará una llamada a esa url con la siguiente información:

```php
array(	'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $data
    )
```

Donde *$data* es un JSON con cada campo del CustomForm y su respuesta

```json
{
  "email": "johndoe@gmail.com",
  "dni": "24586932",
  ...
}
```

### Response
Como respuesta, debe retornar un JSON con los siguientes valores:

* __Status__ : [Boolean] *True* sí el usuario debe ser registrado, *False* si no.

En caso de que sea *False*, deben enviarse también los siguientes parámetros:

* __Message__ : [String] Mensaje de error a mostrarle al usuario.


```json
{
  "status": true
}

{
  "status": false,
  "message": "Tu DNI no se encuentra registrado"
}
```
