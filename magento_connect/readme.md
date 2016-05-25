Woowup Magento Connect
====================

Setup
----------------
Follow these steps:

1) [Download this zip file](https://github.com/woowup/docs/raw/master/magento_connect/Woowup_Connect-0.3.0.tgz) <br>
2) Install the connector through Magento Connect <br>

![Instalacion](https://github.com/woowup/docs/raw/master/magento_connect/images/01-Instalación.png)

3) Configuring the SOAP user <br>
Go back to Magento's admin and select System->Web Services->Soap/XML-RPC Roles 
<img src="images/Magento-Soap-Config.png" width=300></img>

4) Click on Add new Role <br>

<img src="images/Magento-add-new-role.png" width=200></img>

5) Go to Role Info tab and create a new role with name "Coupon generator". Click Save Role. <br>

<img src="images/Magento-Role-Info.png" ></img>

6) Go now to Role Resources tab. <br>
<br>
<img src="images/Magento-Role-Resources.png" width=200></img>

7) Go down until you find WoowUp API. Select it and click again in Save Role (up in the right). <br>
<img src="images/Magento-WoowUp-API.png" width=350></img>

8) From the System menu, select Web Services->SOAP/XML-RPC Users.<br>
<img src="images/Magento-SOAP-XML.png" width=200></img>

9) Click in Add New User to create a new user.<br>
<img src="images/Magento-New-User.png" width=200></img>

10) Create a new user with name Woowupuser.
Choose a password and type it in the New API Key field and again in the API Key Confirmation field. Then click Save User. <br>
<img src="images/Magento-Woowupuser.png"></img>

11) Now click in User Role. Assign the Coupon generator role and click on Save user.<br>
<img src="images/Magento-Role-Coupon.png"></img>

12) Go to Magento's backend, then to  System -> Configuration -> WOOWUP -> Configuration. <br>

- To get access to WoowUp API from your app, you need the API Key and Contest ID. You will find it in the administrator console, inside the Connect tab. Or you can write us to <mailto:api@woowup.com> for help.

<img src="images/Magento-API-Config.png"></img>

You can choose in which purchase order event the customer will receive its points:

<img src="images/Magento-Sum-Points.png" width="450"></img>

Create user if not exists: Chooes yes to auto-register new customers with its first purchase. If you choose NO, you are forcing customer to first enroll in your Loyalty Program before they can earn points.
<br>
Save all the changes. <br>
<img src="images/Magento-Save-Config.png" width="150"></img>

Finally, take note of:
1. Your magento store URL.
2. Soap user and password

You will need to complete this information in WoowUp backoffice (Connect Tab):

<img src="images/Magento-Connect.png" width="450"></img>

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
