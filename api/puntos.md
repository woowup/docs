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

