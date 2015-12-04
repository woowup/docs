Woowup Magento Connect
====================

Setup
----------------
Follow these steps:

- [Download this zip file](https://github.com/woowup/docs/raw/master/magento_connect/Woowup_Connect-0.3.0.tgz)
- Install the connector through Magento Connect

![Instalacion](https://github.com/woowup/docs/raw/master/magento_connect/images/01-Instalación.png)


- To get access to WoowUp API from your app, you need an API Key. You will find it in the administrator console, inside the Connect tab. Or you can write us to <mailto:api@woowup.com> for help.
- Go to Magento's backend, then to  System -> Configuration -> WOOWUP -> Configuration.
![Configuracion](https://github.com/silvioq/docs/raw/master/magento_connect/images/02-configuracion.png)

- Save all the changes and that's it!


Configuring the widget
------------------------
- Optionally you may want to configure the "Earn points" widget. To do this, go to the menu "CMS/Widgets" and create a new widget of the type "Woowup Points".

The plugin brings twe sample templates to show the points next to the product price (Product Extra Hints) or in the column blocks (Right block). 

![Widget woowup](https://github.com/silvioq/docs/raw/master/magento_connect/images/03-alta-widget.png)

Using the widget option you can change the template to use your own. 

![Widget woowup custom template](https://github.com/silvioq/docs/raw/master/magento_connect/images/04-custom-template.png)

Once the widget is active, next to the product you'll see how many points you may earn.

![Widget hint sum](https://github.com/silvioq/docs/raw/master/magento_connect/images/05-product-hint-rendering.png)

Or use it in the columns of your site.

![Widget hint sum](https://github.com/silvioq/docs/raw/master/magento_connect/images/06-right-column-rendering.png)




Development
----------------
You can find the connector source code here: 
[Repositorio](https://bitbucket.org/woowup/woowup-magento-connect/overview).
