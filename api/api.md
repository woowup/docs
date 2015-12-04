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
