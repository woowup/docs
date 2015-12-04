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

Contenidos
======


Endpoints
---------

### GET /content

Consulta un contenido en particular


| Parameter      | Mandatory | Explanation                                                                                      |
| ------ | ------ | ------ |
| content_id | Si | Id de un contenido |
| with_actions | No | Valores posibles: 1 ó 0. Por defecto su valor es 1 En caso de valer 1, el contenido es devuelto junto con sus acciones correspondientes, caso contrario solo se devuelve la información del contenido. |
| userpoints | No | Solo necesario cuando el Servicio MercadoPago está activo. Calcula dinámicamente los points y price necesarios para el canje de un beneficio según los puntos de un usuario. |


#### GET /content

`HTTP/1.1 200 OK`

```json
{
  "id":"14",
  "title":"Imagen 1",
  "description":"Descripci\u00f3n",
  "status":"closed",
  "image":"https:\/\/cdn.woowup.com\/uploads\/20131107\/55EA97C5-139A-6B87-E04E-BCA57FC14BD0.t.jpg",
  "type":"1",
  "category_id":null,
  "created":"2013-11-07 11:39:41",
  "actions":{
    "share":{
      "id":"22",
      "points":"500",
      "done":"1",
      "status":"active",
      "created":"2013-11-07 11:39:41",
      "url":"http:\/\/www.facebook.com"
    },
    "want":{
      "id":"23",
      "points":"200",
      "done":"2",
      "status":"active",
      "created":"2013-11-07 11:39:41"
    },
    "buy":{
      "id":"24",
      "points":"0",
      "done":"3",
      "status":"active",
      "created":"2013-11-07 11:39:42",
      "url":"http:\/\/www.yahoo.com"
    },
    "view":{
      "id":"25",
      "points":"0",
      "done":"2",
      "status":"active",
      "created":"2013-11-07 11:39:42",
      "url":"http:\/\/www.google.com"
    }
  }
}
```


### GET /connectedservices

Consulta los servicios configurados, en caso de estarlos se retorna la configuración cargada (MP, TiendaNube, ...)



#### GET /connectedservices

`HTTP/1.1 200 OK`

```json
...
{
  "mp":{
    "status":true,
    "data":{
      "id":"1",
      "app_id":"13",
      "app_code":"CONTEST",
      "mp_enabled":"1",
      "mp_clientid":"....",
      "mp_clientsecret":"....",
      "mp_percentage":"5",
      "created":"2013-12-27 14:26:38",
      "vt_enabled":"1",
      "vt_name":"complot",
      "vt_appkey":"....",
      "vt_apptoken":"...",
      "vt_lastprocessedtime":null
    }
  }
}
...
```

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

The detail in json format should be like this:
```json
[{"codigo":"12", "producto":"prod1", "cantidad":2, "precio": 10.3},{...}]
```
Where codigo is product code, producto is product name, cantidad is quantity purchased and precio is unit price.

Example:
```json
curl -H 'Username: xx' -H 'Apikey: xxxx' -H 'Accept: application/json' -d 'dni=33333333&points=100&nrofactura=1234&factura=[{"codigo":"12", "producto":"prod1", "cantidad":2, "precio": 10.3},{"codigo":"13", "producto":"prod3", "cantidad":1, "precio": 1.3}]'  https://www.woowup.com/apiv2/13/add_sale_points_by_dni
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
```json
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




