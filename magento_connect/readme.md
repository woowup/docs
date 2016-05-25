Woowup Magento Connect
====================

Setup
----------------
Follow these steps:

- [Download this zip file](https://github.com/woowup/docs/raw/master/magento_connect/Woowup_Connect-0.3.0.tgz)
- Install the connector through Magento Connect

![Instalacion](https://github.com/woowup/docs/raw/master/magento_connect/images/01-Instalación.png)

Configuring the SOAP user
Go back to Magento's admin and select System->Web Services->Soap/XML-RPC Roles 
<img src="images/Magento-Soap-Config.png" width=300></img>

Click on Add new Role

<img src="images/Magento-add-new-role.png" width=200></img>

Go now to Role Resources tab.
<br>
<img src="images/Magento-Role-Resources.png" width=200></img>

Go down until you find WoowUp API. Select it and click again in Save Role (up in the right).
<img src="images/Magento-WoowUp-API.png" width=350></img>

From the System menu, select Web Services->SOAP/XML-RPC Users.<br>
<img src="images/Magento-SOAP-XML.png" width=200></img>

Click in Add New User to create a new user.<br>
<img src="images/Magento-New-User.png" width=200></img>

Create a new user with name Woowupuser.
Choose a password, and load it in the New API Key field and again in the API Key Confirmation field. Then click Save User. <br>
<img src="images/Magento-Woowupuser.png" width=400></img>


Now click in User Role. Assign the Coupon generator role and click on Save user.
<img src="images/Magento-Role-Coupon.png" width=400></img>

- To get access to WoowUp API from your app, you need an API Key. You will find it in the administrator console, inside the Connect tab. Or you can write us to <mailto:api@woowup.com> for help.
- Go to Magento's backend, then to  System -> Configuration -> WOOWUP -> Configuration.
![Configuracion](https://github.com/silvioq/docs/raw/master/magento_connect/images/02-configuracion.png)

- Save all the changes.


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
