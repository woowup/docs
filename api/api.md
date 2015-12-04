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
