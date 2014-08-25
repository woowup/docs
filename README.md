WoowUp REST API
====================

Este documento describe en forma breve la API para consulta de datos de contenidos, acciones, transacciones y a la vez describe los métodos para ejecución de acciones.

Cómo empezar?
----------------

Debes seguir estos pasos:

1. Registrarte como partner en [WoowUp](http://www.woowup.com).
2. Una vez registrado accederas a las keys de autenticación.
4. Leer la documentación de la API para comprender que puedes hacer con la integración.

Cómo hacer las peticiones
----------------

Todas las URLs tendrán la forma `https://www.woowup.com/apiv2/{app_id}`. Si necesitas acceder a una consulta sobre la app_id 98765 entonces la consulta empezará con `https://www.woowup.com/apiv2/98765`

Puedes hacer una consulta GET en CURL puedes utilizar

```shell
curl -H 'Username: .....' \
  -H 'Apikey: .....' \
  -H 'Content-Type: application/json' \
  https://www.woowup.com/apiv2/98765
```


Para una petición POST, necesitas incluir el `Accept` header y la información POST:

```shell
curl -H 'Username: .....' \
  -H 'Apikey: .....' \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -d 'key=value&...' \
  https://www.woowup.com/apiv2/98765/contents
```

API resources
-----------------

* [Registración y usuarios](https://github.com/woowup/docs/blob/master/api/registracion.md)
* [Contenidos](https://github.com/woowup/docs/blob/master/api/contenidos.md)
* [Puntos](https://github.com/woowup/docs/blob/master/api/puntos.md)



Contacto
----------------------

Puedes contactarnos por cualquier duda respecto a la API en <mailto:api@woowup.com>.
