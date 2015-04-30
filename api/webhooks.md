Webhooks
====================

##Validar Registro de Usuario 

La URL a utilizar debe ingresarse en la sección de __Conecta__ dentro del administrador


###Request
Al registrarse un usuario, se disparará una llamada a esa url con la siguiente información:

```php
array(	'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $data
    )
```

Donde *$data* es un JSON con cada campo del CustomForm y su respuesta

```json
{
  "email": 'johndoe@gmail.com',
  "dni": '24586932',
  ... 
}
```

###Response
Como respuesta, debe retornar un JSON con los siguientes valores:

* __Status__ : [Boolean] *True* sí el usuario debe ser registrado, *False* si no.

En caso de que sea *False*, deben enviarse también los siguientes parámetros:

* __Message__ : [String] Mensaje de error a mostrarle al usuario.


```json
{
  "status": true
}

{
  "status": false,
  "message": 'Tu DNI no se encuentra registrado'
}
```