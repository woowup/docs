<?php
define( 'WOOWUP_API_VERBOSE', false );

class  WoowUpAPIException  extends  Exception
{
    private  $data;
    private  $response;
    public  function  __construct( $message, $data = null, $response = null )
    {
        parent::__construct( $message );
        $this->data = $data;
        $this->response = $response;
    }
    
    public  function  getData(){ return  $this->data; }
    public  function  getResponse(){ return  $this->response; }
    
}

class  WoowUpAPI
{
    private $_apiKey;
    private $_contestId;
    private $_apiUrl = 'https://admin.woowup.com/apiv2/';
    private $curl = null;
    private $lastResponse = null;

    /**
     * @param  string  $apiKey     Apikey for woowup
     * @param  string  $programId  Program/Contest ID
     * @throws WoowUpAPIException
     */
    public function __construct ($apiKey, $programId)
    {
        $this->_apiKey      = $apiKey;
        $this->_contestId   = $programId;
        if( !function_exists( 'curl_init' ) ) throw new WoowUpAPIException( 'curl extension is required for WoowUpAPI conector' );
    }
    
    /**
     * Get curl handler
     * @throws  WoowUpAPIException
     * @return  curl handler
     */
    private  function  getCurl()
    {
        if( $this->curl !== null ) return $this->curl;
        if ($curl = curl_init()) {
            $headers = array();
            $headers[] = 'ApiKey: ' . $this->_apiKey;
            $headers[] = 'username:'. $this->_contestId;
            $headers[] = 'Accept: application/json';
            
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true );
            curl_setopt($curl, CURLOPT_VERBOSE, WOOWUP_API_VERBOSE );
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false );
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false );
            return $this->curl = $curl;
        }
        
        throw new WoowUpAPIException( 'Can\'t init curl system' );
    }
    
    /**
     * Call to URL and parse result
     * @param  string $url          URL
     * @param  array  $parameters   post fields
     * @return mixed  parsed result
     * @throws  WoowUpAPIException
     */
    private  function   call( $url, array $parameters = null )
    {
        curl_setopt($this->getCurl(), CURLOPT_URL, $url);
        if( $parameters )
        {
            curl_setopt($this->getCurl(), CURLOPT_POST, true);
            curl_setopt($this->getCurl(), CURLOPT_POSTFIELDS, http_build_query($parameters));
        }
        else curl_setopt($this->getCurl(), CURLOPT_POST, false );
        
        try {
            $this->lastResponse = curl_exec($this->getCurl());
            return  $this->parseResult($this->lastResponse);
        } catch (Exception $e) {
            throw new WoowUpAPIException($e->getMessage() );
        }
        
    }
    /**
     * Program Points per sale
     * @return  int
     * @throws  WoowUpAPIException
     */
    public function getSalePoints() {

        $url = $this->_apiUrl.$this->_contestId."/contest_sale_points/";

        $result = $this->call( $url );

        if ( is_array( $result ) && isset( $result["status"] ) )
            return $result["data"]["contest_sale_points"];

        throw new WoowUpAPIException('woowup api response error on getSalePoints',
                $result, $this->lastResponse);
    }


    /**
     * Calls the api to get the user id to be used in add_sale_points_by_uid 
     * @param   string    $uID           user id
     * @return  mixed   $woowupUserId  or false if not found
     * @throws  WoowUpAPIException
     */
    public function getCustomerByID($uID) {
        
        $url = $this->_apiUrl.$this->_contestId."/user_by_uid/?uid=".$uID;

        $result = $this->call( $url );

        if( !is_array($result) ) 
            throw new WoowUpAPIException('woowup api response error on getCustomerByID',
                    null, $this->lastResponse);
        if (isset( $result["status"] ) && $result["status"] ){
            return $result["data"]["user"]["service_uid"];
        } else return false;

    }

    /** 
     * Reward with points to customer
     * orderDetail param is array. It is explained in detail in 
     * https://github.com/woowup/docs/blob/master/api/puntos.md#post-add_sale_points_by_uid
     * 
     * @param  string    $uID           user id
     * @param  integer   $points        points earned
     * @param  string    $orderNumber   Customer order
     * @param  mixed     $orderDetail   Order detail
     * @throws  WoowUpAPIException
     * @return int       Transaction id
     */
    public  function rewardCustomerWithPoints($uId, $points, $orderNumber, $orderDetail ) {

        $url = $this->_apiUrl.$this->_contestId."/add_sale_points_by_uid";
        $parameters = array(
            "app_id"        => $this->_contestId,
            "uid"           => $uId,
            "points"        => $points,
            "nrofactura"    => $orderNumber,
            "factura"       => json_encode($orderDetail),
        );

        $result   = $this->call($url, $parameters);
        if (is_array( $result ) && $result["status"])
            return $result["data"]["transaction_id"];
            
        throw new WoowUpAPIException( "commit points to woowup ERROR",
                $result, $this->lastResponse);

    }


    /**
     * Create a customer object in the platform that can earn points. 
     * But he needs to register yet to be able to reedem a price.
     * 
     * @param  string    $uID           user id
     * @param  string    $email         email
     * @param  string    $lastName
     * @param  string    $firstName
     * @return  $uID
     * @throws  WoowUpAPIException
     */
    public  function  initializeCustomer($uid, $email, $lastName, $firstName )
    {
        $url = $this->_apiUrl.$this->_contestId."/initialize_user";

        $parameters = array(
            "uid"        => $uid,
            "first_name" => $firstName,
            "last_name"  => $lastName,
            "email"      => $email,
        );

        $result   = $this->call($url, $parameters);
        if( $result["status"] ) return $uid;
        throw new WoowUpAPIException("Error on initialize_user",
            $result, $this->lastResponse);
    }

    /**
     * Returns an assotiative array based on the json response
     */
    private function parseResult($response){
        if (!empty($response)){
            return json_decode($response, true);
        } else {
            return false;
        }
    }

}
