WoowUp REST API
====================

Este documento describe en forma breve la API para consulta de datos de contenidos, acciones, transacciones y a la vez describe los métodos para ejecución de acciones.

Cómo empezar?
----------------

Debes seguir estos pasos:

1. Registrarte como partner en [WoowUp](http://www.woowup.com).
2. Una vez registrado accederas a la form de autenticación.
3. Leer el documento [Cómo autenticarse](#authentication).
4. Leer la documentación de la API para comprender que puedes hacer con la integración.

Cómo hacer las peticiones
----------------

Todas las URLs tendrán la forma `https://www.woowup.com/apiv2/{app_id}`. Si necesitas acceder a una consulta sobre la app_id 98765 entonces la consulta tendra la forma `https://www.woowup.com/apiv2/98765`

Puedes hacer una consulta en CURL con

```shell
curl -H 'Authentication: bearer ACCESS_TOKEN ' \
  -H 'User-Agent: MyApp (name@email.com)' \
  https://www.woowup.com/apiv2/98765
```

donde `ACCESS_TOKEN` es el access token del cliente.

Para crear algo, necesitas incluir el `Content-Type` header y la información JSON:

```shell
curl -H 'Authentication: bearer ACCESS_TOKEN ' \
  -H 'Content-Type: application/json' \
  -H 'User-Agent: MyApp (name@email.com)' \
  -d '{ "name": "My new product" }' \
  https://www.woowup.com/apiv2/98765/contents
```

API resources
-----------------

* [Registración](https://github.com/woowup/api/blob/master/api/registration.md)


Contacto
----------------------

Puedes contactarnos por cualquier duda respecto a la API en <mailto:api@woowup.com>.
