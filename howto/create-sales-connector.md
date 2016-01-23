#Connect your e-commerce or sales software with WoowUp

It's easy to connect your own e-commerce or sales system with WoowUp. Here we'll cover the steps you need to follow showing a PHP example.

These are the steps:

1) Get your Apikey and Program Id from the Connect tab in the administrator module of WoowUp. You'll need this info to call all the APIs endpoints. For this exmample, will use the following:

```php
$apiKey = '55db302267baf5826b6a91c81f4219dafbe49115176d34f0f3cfebbb6ba44521';
$programId = 14;
```

2) Identify in your code the place where the Purchase Order is marked as payed (or any other state you want). 

3) Get the info of the customer to reward. Here is an example but you will need to get the info from your system: 

```php
$customerID='testemail@test.com';
$customerEmail='testemail@test.com';
$customerFirstName = 'Jhon';
$customerLastname = 'Doe';
```

Look that in this example we are using the email as the ID to identify the customer in WoowUp. But you can use any other ID as long as it univocally identify your customer (cell phone number, CPF (Brasil) / DNI (Argentina) / RUT (Chile) / Social Security Number (USA), etc). Remember first to go to the administrator panel -> Configure -> Registraton Form and configure your ID Field (default is email).

4) Look for the customer. Is he already in your program or he is new?

```php
$uId = $WoowUpAPI->getCustumerByID($customerID);
```

4b) (optional) If it is a new customer, you can add it to your program. If you do that, you will add it in a state we call it "initialized" but not registered. What it means is that the first time this customer will try to navigate the reward's catalog to redeem his points, he will first have to complete the registration form.

```php
if( $uId === false )
{
    $uId = $WoowUpAPI->initializeCustomer($customerID, 
        $customerEmail,
        $customerFirstName,
        $customerLastname;
}
```

Or you may prefer that only registered customers in your Loyalty Program may be able to earn points, as in airlines programs where you only earn points if you have registered.

5) Get the info of the order and calculate how many points your customer earned. This is just an example but look at the format you will need to use for the order detail.

```php
$orderNumber='1034242';
$orderTotal=300;
$orderDetail[] = array(
    'codigo' => 'SKU1034-212',
    'producto' => 'LA LAKERS BLUE T-SHIRT',
    'cantidad' => 3,
    'precio' => 300 // This is the total price for this item, not the unit price. 
```
NOTE: The order detail is optional. But if you include it then you will be able to take adavantage of the filters in the Database tab to create filters and segments as well as see all the customer behaviour in his profile.

6) Get how many points you will give for each $:

```php
$salePoints = $WoowUpAPI->getSalePoints();
```

7) Finally reward the customer:
```
$WoowUpAPI->rewardCustomerWithPoints($uId, $orderTotal * $salePoints, $orderNumber, $orderDetail);
```
The logic may be a little different for your specific platform / system / case but these are all the steps you will have to take in consideration.

Check the [full code](src) of this example so you can see the complete implementation. 
