#Create a custom connector with your e-commerce or sales software
###Overview

It's very easy to create a custom connector to your own e-commerce or sales system. Here we'll cover the steps to build it.

####Process one Purchase Order at a time.

If you can identify in your app the place where the Purchase Order is makred as payed (or any other state you profere), you need to call WoowUp right there to register the transaction and give the related points to the customer.

First get your Apikey and Contest Id from the Connect tab in the administrator module to include it in the following code:

```
    // $contestId = 'REPLACE WITH YOUR CONTEST ID';
    // $apiKey = REPLACE WITH YOUR APIKEY; 
```

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
        WoowUpAPI::commitPointsToWoowup($uId, $points, $orderNumber, $orderDetail);
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
        // Now it's the same as in the previes example.
        
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
            WoowUpAPI::commitPointsToWoowup($uId, $points, $orderNumber, $orderDetail);
        }else{
            //User not found, not currently registered in your loyalty program
        }
    }
´´´
