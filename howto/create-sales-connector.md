#Create a custom connector with your e-commerce or sales software
###Overview

It's very easy to create a custom connector to your own e-commerce or sales system. Here we'll cover the steps to build it.

To start rember to do the following:

1. Sign up as a partner in [WoowUp](http://www.woowup.com).
2. Once registered, get your Apikey from the Connect tab in the administrator module.

####Process one Purchase Order at a time.

```
    public function execute($order){

        Mage::log(
           "Starting WoowUp checkout observer.",
           null,
           'woowup-connect.log',
           true
        );

        $this->_contestId = Mage::getStoreConfig('woowup/general/contest_id',Mage::app()->getStore());
        $this->_apiKey = Mage::getStoreConfig('woowup/general/api_key',Mage::app()->getStore());

        $uId = $this->getWoowupUIdByMail($order->getCustomerEmail());


        if (!empty($uId)){
            $salePoints = $this->getContestSalePoints();
            if( !$salePoints ) return;

            $points = ceil($salePoints * floor($order->getGrandTotal()));
            $orderDetail = $this->createOrderDetailJson($order);

            $this->commitPointsToWoowup($uId, $points, $order->getId(), $orderDetail);
        }else{
            //No se encuentra el usuario
            Mage::log(
               "{user id not found with email: ".$order->getCustomerEmail()."}",
               null,
               'woowup-connect.log',
               true
            );
        }

    }
´´´
