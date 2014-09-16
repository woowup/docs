Puntos
======


Endpoints
---------

### POST /add_points

Suma puntos a un usuario buscandolo por su ID en la aplicación. Retorna el id de la transacción

| Parámetro      | Obligatorio | Explicación                                                                                      |
| ------ | ------ | ------ |
| userapp_id | Si | Id del usuario en la aplicación |
| points | Si | Puntos a sumar |
| concept | No | Texto corto descriptivo del motivo de la suma de puntos. Ej: “Promoción de verano” |


#### POST /add_points

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

Suma puntos a un usuario buscandolo por su ID en la aplicación, especificando el detalle de la factura. Retorna el id de la transacción

| Parámetro      | Obligatorio | Explicación                                                                                      |
| ------ | ------ | ------ |
| uid | Si | Id del usuario en la aplicación |
| points | Si | Puntos a sumar |
| nrofactura | Si | Nro de la factura |
| factura | No | Detalles de la factura en formato json |

El formato del detalle de la factura deber ser:
```json
[{"codigo":"12", "producto":"prod1", "cantidad":2, "precio": 10.3},{...}]
```

Por ejemplo
```json
curl -H 'Username: xx' -H 'Apikey: xxxx' -H 'Accept: application/json' -d 'uid=31824477&points=100&nrofactura=1234&factura=[{"codigo":"12", "producto":"prod1", "cantidad":2, "precio": 10.3},{"codigo":"13", "producto":"prod3", "cantidad":1, "precio": 1.3}]'  https://www.woowup.com/apiv2/13/add_sale_points_by_uid
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

### GET /transactions

Devuelve las trasacciones por usuario

| Parámetro      | Obligatorio | Explicación                                                                                      |
| ------ | ------ | ------ |
| userapp_id | Si | Id del usuario en la aplicación 


#### GET /transactions

`HTTP/1.1 200 OK`

```json
[
  {
    "id":"2187",
    "points":"20",
    "action_id":null,
    "concept_id":"3",
    "description":null,
    "created":"2014-02-26 12:25:08"
  },
  {
    "id":"2188",
    "points":"20",
    "action_id":null,
    "concept_id":"3",
    "description":"3423 23",
    "created":"2014-02-26 12:27:40"
  },
  {
    "id":"2189",
    "points":"20",
    "action_id":null,
    "concept_id":"3",
    "description":"342",
    "created":"2014-02-26 12:45:12"
  },
  {
    "id":"2429",
    "points":"-50",
    "action_id":"51",
    "concept_id":null,
    "description":null,
    "created":"2014-09-09 18:10:16"
  }
]
```
