#Create a custom connector with your e-commerce or sales software
###Overview

It's easy to connect your own e-commerce or sales system with WoowUp. Here we'll cover the steps you need to follow showing a PHP example.

These are the steps:

1) Get your Apikey and Program Id from the Connect tab in the administrator module of WoowUp. You'll need this info to call all the APIs endpoints. For this exmample, will use the following:

```
    $apiKey = '55db302267baf5826b6a91c81f4219dafbe49115176d34f0f3cfebbb6ba44521';
    $programId = 14;
    $apiUrl = 'https://admin.woowup.com/apiv2/';
```

1) Identify in your code the place where the Purchase Order is marked as payed (or any other state you want). 
2) Get the info of the customer to reward. Here is an example but you will need to get the info from your system: 

        $customerID='testemail@test.com';
        $customerEmail='testemail@test.com';
        $customerFirstName = 'Jhon';
        $customerLastname = 'Doe';

Look that in this example we are using the email as the ID to identify the customer in WoowUp. But you can use any other ID as long as it univocally identify your customer (cell phone number, CPF (Brasil) / DNI (Argentina) / RUT (Chile) / Social Security Number (USA), etc). Remember first to go to the administrator panel -> Configure -> Registraton Form and configure your ID Field (default is email).

Get the email of the customer and assign it to $email in the following code to look for the customer in your Loyalty Program Database:

```
    $email = 'replace-it-with-your-customer-email@domain.com'; 
        
    $uId = WoowUpAPI::getUIdByMail($email);

    if (!empty($uId)){
        $salePoints = WoowUpAPI::getContestSalePoints($contestId, $apiKey);
        if( !$salePoints ) return;

        // In the following example, replace the values for the actual data from your Purchase Order;
        $total = 50;
        $orderNumber=5;
        $orderDetail = array();

        // You may add multiple items to the order detail.
        $orderDetail[] = array(
                'sku' => 'SK02313',
                'productName' => 'Vanilla cake',
                'Quantity' => 1,
                'Price' => 16
            );

        $points = ceil($salePoints * floor($total);
        WoowUpAPI::commitPointsToWoowup($contestId, $apiKey, $uId, $points, $orderNumber, $orderDetail);
    }else{
        //User not found, not currently registered in your loyalty program
    }
```

####Process all the Purchase Orders together.

Other approach is to process the Porchase Orders as a batch. For example, all the PO of the current day, all together, at the and of the day. 

In this case, you'll need to create a process and run it, for example, once a day at the end of the day. 
It will look something like this:

```
    // Get your sales of the current day
    $sales = getAllSalesOfTheCurrentDay() 
    
    for each ($order in $sales)
    {
        // Now it's the same as in the previous example.
        
        $email = 'replace-it-with-your-customer-email@domain.com'; 
            
        $uId = WoowUpAPI::getUIdByMail($email);
    
        if (!empty($uId)){
            $salePoints = WoowUpAPI::getContestSalePoints($contestId, $apiKey);
            if( !$salePoints ) return;
    
            // In the following example, replace the values for the actual data from your Purchase Order;
            $total = 50;
            $orderNumber=5;
            $orderDetail = array();
    
            // You may add multiple items to the order detail.
            $orderDetail[] = array(
                    'sku' => 'SK02313',
                    'productName' => 'Vanilla cake',
                    'Quantity' => 1,
                    'Price' => 16
                );
    
            $points = ceil($salePoints * floor($total);
            WoowUpAPI::commitPointsToWoowup($contestId, $apiKey, $uId, $points, $orderNumber, $orderDetail);
        }else{
            //User not found, not currently registered in your loyalty program
        }
    }
´´´
