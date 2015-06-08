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
    // $email = 
        
    $uId = WoowUpAPI::getUIdByMail($email);

    if (!empty($uId)){
        $salePoints = WoowUpAPI::getContestSalePoints();
        if( !$salePoints ) return;

        $points = ceil($salePoints * floor($order->getGrandTotal()));
        $orderDetail = $this->createOrderDetailJson($order);

        WoowUpAPI::commitPointsToWoowup($uId, $points, $order->getId(), $orderDetail);
    }else{
        //User not found, not currently registered in your loyalty program
    }
´´´
