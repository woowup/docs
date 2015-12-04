Puntos
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


