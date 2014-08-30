Registración
======


Endpoints
---------

### POST /register_user_classic

Retorna los datos del usuario registrado.

| Parámetro      | Obligatorio | Explicación                                                                                      |
| ------ | ------ | ------ |
| uid | Si | DNI del usuario |
| pass | Si | Pin del usuario |
| email | Si | Email |
| first_name | Si | Nombre |
| last_name | Si | Apellido |


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



Usuarios
======


Endpoints
---------

### GET /user_by_email

Retorna la información de un usuario buscando por email


| Parámetro      | Obligatorio | Explicación                                                                                      |
| ------ | ------ | ------ |
| email | Si | Email |


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












