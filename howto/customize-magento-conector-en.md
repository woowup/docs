# Customize Woowup-Connect Magento Extension

### Overview

The world wide eCommerce system Magento is able to implement custom processes and extensions, based on Event-Observer
pattern design.

The Woowup-Connect extension includes two new events, which let run custom code for manage custom rules.

The events are
- woowup_after_get_points
- woowup_before_order_points

### woowup_after_get_points
It's runned after to get the point multiplier on Woowup platform.
It can modify this multiplier with custom rules, coded into the event.

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
It's runned before to calculate credit points for an order. It can modify the total credit points.
If the function modifies the calculated points, the extension would send that quantity to woowup platform 

The setPoints method set the total credit points for an order, like as the example.

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

