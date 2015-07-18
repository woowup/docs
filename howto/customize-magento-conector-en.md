# How to override the default behaviour of the Woowup-Connect Magento Extension

### Overview

Magento is able to implement custom processes and extensions, based on Event-Observer
pattern design.

The Woowup-Connect extension includes two new events, which lets you run custom code to manage custom rules.

The events are
- woowup_after_get_points
- woowup_before_order_points

### woowup_after_get_points
It lets you implement code to change the multiplier that is applied to product price to calculate the points on Woowup platform.

The event receive a product as parameter. This is the current product from frontend

Example
```
  public  function   after_points( $observer )
  {
    $event = $observer->getEvent();
    $varObj  = $event->getPointObj( );
    $points  = $varObj->getPoints( );
    $product = $varObj->getProduct( );
    
    // Double points if the product is XXXX.
    if( $product && $product->getSku() == 'xxxx' ) $varObj->setPoints( $points * 2 );
  }
```

### woowup_before_order_points
It let's you implement code to calculate how many points should be assigned for an order. 
If the function modifies the calculated points, the extension would send that quantity to WoowUp. 

Example:

```  
  public  function  before_order_points( $observer )
  {
    $event = $observer->getEvent( );
    $varObj = $event->getOrderObj( );
    $order  = $varObj->getOrder( );
    
    // If the customer is 4, entonces cuatriplica los puntos, it quadruples the points.
    if( $order->getCustomerId( ) === 4 )
    {
      $varObj->setPoints( $order->getGrandTotal( ) * $varObj->getDefaultPoints( ) * 4 );
    }
    
  }
```

