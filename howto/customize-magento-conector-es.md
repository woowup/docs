# Customizaciones sobre la extensión Woowup-Connect de Magento

### Resumen

El popular sistema de eCommerce Magento permite implementar procesos y extensiones custom, basándose en el patrón
de diseño Event-Observer.

La extensión Woowup-Connect incluye dos eventos nuevos, los cuales permiten ejecutar código específico para gestionar
reglas personalizadas.

Los eventos en cuestión son
- woowup_after_get_points
- woowup_before_order_points

### woowup_after_get_points
Se ejecuta luego de obtener el multiplicador de puntos de la plataforma Woowup.
Tiene la potestad de modificar este multiplicador de acuerdo a reglas personalizadas
que estén codificadas en el evento.
El producto que recibe como parámetro del objeto varien corresponde al producto
actual del frontend.
  
Ejemplo de uso:

```
  public  function   after_points( $observer )
  {
    $event = $observer->getEvent();
    $varObj  = $event->getPointObj( );
    $points  = $varObj->getPoints( );
    $product = $varObj->getProduct( );
    
    // si el sku actual es xxxx, duplica los puntos.
    if( $product && $product->getSku() == 'xxxx' ) $varObj->setPoints( $points * 2 );
  }
```

### woowup_before_order_points
  
Se ejecuta antes de calcular los puntos a acreditar en una orden.
Tiene la potestad de modificar los puntos totales de la orden.
En caso que la función modifique los puntos en el objeto varien pasado
como parámetro, se enviará dicha cantidad precalculada a la plataforma woowup.

El método setPoint sobre el objeto varien establece los puntos a acreditar para la orden.
  
Ejemplo de uso:

```  
  public  function  before_order_points( $observer )
  {
    $event = $observer->getEvent( );
    $varObj = $event->getOrderObj( );
    $order  = $varObj->getOrder( );
    
    // Si el cliente es el id 4, entonces cuatriplica los puntos.
    if( $order->getCustomerId( ) === 4 )
    {
      $varObj->setPoints( $order->getGrandTotal( ) * $varObj->getDefaultPoints( ) * 4 );
    }
    
  }
```
  
