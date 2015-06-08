#Create a custom connector with your e-commerce or sales software
###Overview

It's very easy to create a custom connector to your own e-commerce or sales system. Here we'll cover the steps to build it.

To start rember to do the following:

1. Sign up as a partner in [WoowUp](http://www.woowup.com).
2. Once registered, get your Apikey from the Connect tab in the administrator module.

####Process one Purchase Order at a time.


```
    // $contestId = 'REPLACE WITH YOUR CONTEST ID';
    // $apiKey = REPLACE WITH YOUR APIKEY; 

    // $email = 
        
    $uId = $this->getWoowupUIdByMail($email);


    if (!empty($uId)){
        $salePoints = $this->getContestSalePoints();
        if( !$salePoints ) return;

        $points = ceil($salePoints * floor($order->getGrandTotal()));
        $orderDetail = $this->createOrderDetailJson($order);

        $this->commitPointsToWoowup($uId, $points, $order->getId(), $orderDetail);
    }else{
        //User not found
    }
´´´
