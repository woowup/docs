<?php
/**
* Sample connector code 
*/

require  "WoowUpAPI.php";

class WoowUpConnetorSample
{
    const apiKey = 'c62e48ba7fd0ab2d513cb43f03bd13637253a9a72450c9e78c6e8ba8030b9936';
    const programId = 116;
 
    /*Entrance point*/
    static public function test(){

        $customerID='testemail@example.com';
        $customerEmail='testemail@example.com';
        $customerFirstName = 'Jhon';
        $customerLastname = 'Doe';

        $orderNumber= rand( 100000, 999999 );
        $orderTotal=300;
        
        # Order detail format is explained on 
        # https://github.com/woowup/docs/blob/master/api/puntos.md#post-add_sale_points_by_uid
        $orderDetail[] = array(
            'codigo' => 'SKU1034-212',
            'producto' => 'LA LAKERS BLUE T-SHIRT',
            'cantidad' => 3,
            'precio' => 300
        );

        $WoowUpAPI= new WoowUpAPI( self::apiKey, self::programId);

        try
        {
            $uId = $WoowUpAPI->getCustomerByID($customerID);
        
            if( $uId === false )
            {
                $uId = $WoowUpAPI->initializeCustomer($customerID, 
                    $customerEmail,
                    $customerFirstName,
                    $customerLastname );
            }
                    
            $salePoints = $WoowUpAPI->getSalePoints();
            if( !$salePoints ) return;

            $transaction_id = $WoowUpAPI->rewardCustomerWithPoints($uId, 
                    $orderTotal * $salePoints, $orderNumber, $orderDetail);
            echo "Transaction id $transaction_id generated for $customerEmail\n";
        }
        catch( WoowUpAPIException $e )
        {
            $data = $e->getData();
            $lastResponse = $e->getResponse( );
            error_log( $e->getMessage() );
            if( $data ) error_log( print_r( $data, true ) );
            if( $lastResponse ) error_log( $lastResponse );
        }
    }

}

WoowUpConnetorSample::test();

?>
