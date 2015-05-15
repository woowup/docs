Integrating your site with WoowUp
=================================

Here you will find how to get information about contents, actions, transactions and users of your app.
Also, you will find how to register a new user, set a coupon status and add points to a user.

##Getting started

####Authentication

1. Sign up as a partner in [WoowUp](http://www.woowup.com).
2. Once registered, get your Apikey from Connect tab in the administrator.

For any call, you must use 2 headers:
 
 * __Username:__ your app_id 
 * __Apikey:__ the apikey of point 2.

####General usage

All URLs must be like `https://www.woowup.com/apiv2/{app_id}`. 

So, for example, if your app is id=98765, you should do a GET request like

```shell
curl -H 'Username: .....' \
  -H 'Apikey: .....' \
  -H 'Content-Type: application/json' \
  https://www.woowup.com/apiv2/98765
```

For a POST request, you have to include the 'Accept: application/json' header

```shell
curl -H 'Username: .....' \
  -H 'Apikey: .....' \
  -H 'Accept: application/json' \
  -d 'key=value&...' \
  https://www.woowup.com/apiv2/98765/add_points...
```

##How To

* [Register a new user](https://github.com/woowup/docs/blob/master/api/examples.md#register-a-new-user)
* [Add points](https://github.com/woowup/docs/blob/master/api/examples.md#add-points)
* [Add sale points](https://github.com/woowup/docs/blob/master/api/examples.md#add-sale-points)
* [Get a user](https://github.com/woowup/docs/blob/master/api/examples.md#get-a-user)
* [Get user's transactions](https://github.com/woowup/docs/blob/master/api/get-users-transactions)
* [Mark coupon as changed](https://github.com/woowup/docs/blob/master/api/get-users-transactions)

##API resources

* [Users](https://github.com/woowup/docs/blob/master/api/registracion.md)
* [Benefits and coupons](https://github.com/woowup/docs/blob/master/api/beneficios.md)
* [Contents](https://github.com/woowup/docs/blob/master/api/contenidos.md)
* [Points](https://github.com/woowup/docs/blob/master/api/puntos.md)
* [Club](https://github.com/woowup/docs/blob/master/api/club.md)
* [Webhooks](https://github.com/woowup/docs/blob/master/api/webhooks.md)

##Magento Connect

You can add points points directly from your Magento E-Commerce. For further information, check [here](https://github.com/woowup/docs/blob/master/magento_connect/readme.md).

##Contact

Puedes contactarnos por cualquier duda respecto a la API en <mailto:api@woowup.com>.