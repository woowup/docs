Coupons
======


Endpoints
---------

### POST /coupon_status

Change a redeemed cupon status


| Parameter      | Required | Details   |
| coupon_id | Yes | Coupon ID |
| ------ | ------ | ------ |
| status | Yes | 0: Available, 1:Assigned, 3:Cancelled|


#### POST /coupon_status

`HTTP/1.1 200 OK`

```json
{
  "status":true,
  "data":"Cambio de estado efectuado con exito"
}
```
