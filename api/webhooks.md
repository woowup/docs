Webhooks
====================

##Authorize a new user registration 

You must specifiy a webservice URL in the section __Conecta__ of WoowUp administration module


###Request
When a new user registers, a call is dispatched to your webservice

```php
array(	'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $data
    )
```

Where *$data* is a JSON structure with every field of the registration form and the user's ansewer.

```json
{
  "email": "johndoe@gmail.com",
  "CPF": "24586932",
  ... 
}
```

###Response
As a response, you will receive a JSON with this data:

* __Status__ : [Boolean] *True* if the user is allowed to be registered, *False* if the user should not be allowed to register.

In case of a *False* response, you should specify the following as well:

* __Message__ : [String] Message to show the user the reason of the denial.


```json
{
  "status": true
}

{
  "status": false,
  "message": "Your CPF wasn't found in our customers database. Please contact our call center to assist you."
}
```
