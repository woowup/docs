Woowup Magento Connect
====================

Instalacion
----------------
Debes seguir estos pasos:

- [Bajar el archivo .zip](https://github.com/woowup/docs/raw/master/magento_connect/Woowup_Connect-0.3.0.tgz)
- Instalar el conector vía Magento Connect

![Instalación](https://github.com/woowup/docs/raw/master/magento_connect/images/01-Instalación.png)


- Para poder tener acceso a la API de woowup desde tu aplicacion, deberas tener una API key que te proveeremos. Para ello solicitala por mail a: <mailto:api@woowup.com> si es que todavia no te la hemos enviado.
- Una vez recibida la API key debes ingresar al Backend de Magento e ingresarla en la seccion System -> Configuration -> WOOWUP -> Configuration.
![Configuración](https://github.com/silvioq/docs/raw/master/magento_connect/images/02-configuracion.png)

- Guardamos los cambios y todo listo, ¡A Sumar Puntos!


Configuración del widget
------------------------
- Opcionalmente, podrás configurar el widget "Sumá puntos". Para ello, deberás ingresar al menú "CMS/Widgets", y crear un nuevo widget del tipo "Woowup Points".

El plugin provee dos templates de ejemplo para mostrar tanto junto al precio (Product Extra Hints) o en los bloques de las columnas (Right block). 

![Widget woowup](https://github.com/silvioq/docs/raw/master/magento_connect/images/03-alta-widget.png)

En las opciones del widget, podrás indicarle que use tu propio template

![Widget woowup custom template](https://github.com/silvioq/docs/raw/master/magento_connect/images/04-custom-template.png)

Una vez activado el widget, junto al precio de tu producto mostrará la cantidad de puntos a ganar ...

![Widget hint sum](https://github.com/silvioq/docs/raw/master/magento_connect/images/05-product-hint-rendering.png)

O podrás usarlo en las columnas de tu página

![Widget hint sum](https://github.com/silvioq/docs/raw/master/magento_connect/images/06-right-column-rendering.png)




Desarrollo
----------------
El source code del proyecto esta hosteado en Bitbucket: [Repositorio](https://bitbucket.org/woowup/woowup-magento-connect/overview).
