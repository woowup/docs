Beneficios
======


Endpoints
---------

### POST /coupon_status

Cambia el estado de un cupón


| Parameter      | Mandatory | Explanation                                                                                      |
| ------ | ------ | ------ |
| coupon_id | Si | Id de un cupón |
| status | Si | 4 : Estado Canjeado |


#### POST /coupon_status

`HTTP/1.1 200 OK`

```json
{
  "status":true,
  "data":"Cambio de estado efectuado con exito"
}
```
