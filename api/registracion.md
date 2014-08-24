Registración
======


Endpoints
---------

### GET /content

Receive a single Store.


| Parameter      | Mandatory | Explanation                                                                                      |
| ------ | ------ | ------ |
| content_id | Si | Id de un contenido |
| with_actions | No | Valores posibles: 1|0
Por defecto su valor es 1
En caso de valer 1, el contenido es devuelto junto con sus acciones correspondientes, caso contrario solo se devuelve la información del contenido. |
| userpoints | No | Solo necesario cuando el Servicio MercadoPago está activo.
Calcula dinámicamente los points y price necesarios para el canje de un beneficio según los puntos de un usuario. |


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
