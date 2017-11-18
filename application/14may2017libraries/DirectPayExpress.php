<?php

class DirectPayExpress {
    private $host;
    private $username;
    private $password;
    private $endPoint;
    private $debug;
    
    public function __construct(){
		$this->CI = &get_instance();
        $this->post = array();
        $this->debug = false;
    }
    
   public function setCredentials($apiInfo){
	   //getPrint($apiInfo); exit;
	   if($apiInfo->api_mode=='live'){
		   $this->host		= (!empty($apiInfo->api_live_url)) ? ($apiInfo->api_live_url) : ('https://client.directpayexpress.com/api');
		   $this->username	= $apiInfo->api_live_user;
		   $this->password	= $apiInfo->api_live_key;
	   }else{
		   $this->host		= (!empty($apiInfo->api_sandbox_url)) ? ($apiInfo->api_sandbox_url) : ('https://client.directpayexpress.com/api');
		   $this->username	= $apiInfo->api_sandbox_user;
		   $this->password	= $apiInfo->api_sandbox_key;
	   }
	   
   }
    
    /**
     * Getters and Setters
     */
    public function setPost($postArray) { $this->post = $postArray; }
    public function setEndpoint($endPoint) { $this->endPoint = $endPoint; }
    public function getEndPoint() { return $this->endPoint; }
    public function debug() { $this->debug = true; }
    
    
    //------------------------------------------------------------------------------
    public function createOrder($postData)
    {
        $this->post = $postData;
		$this->setEndpoint("/orders/generateOrder/");
        
        $response = $this->send();

       // print $response;
        return json_decode($response, true);
    }
	
	
    //------------------------------------------------------------------------------
    /**
     * Loads a card
     *
     * @param int $accountId
     * @param float $amount
     */
    //------------------------------------------------------------------------------
    public function loadCard($accountId, $amount)
    {
        
		$this->setEndpoint("/group/loadCard/{$accountId}/{$amount}");
        
        $response = $this->send();
        
        return json_decode($response, true);
    }
    
    
    
    //------------------------------------------------------------------------------
    /**
     * Loads a card
     *
     * @param int $accountId
     */
    //------------------------------------------------------------------------------
    public function getBalance($accountId, $includeBalance='No')
    {
        $this->setEndpoint("/user/getBalance/{$accountId}/{$includeBalance}");
        
        $response = $this->send();

        print $response;
        return json_decode($response, true);
    }

    
    
    //------------------------------------------------------------------------------
    /**
     * Gets data associated with an Account
     *
     * @param int $accountId
     */
    //------------------------------------------------------------------------------
    public function getAccount($accountId)
    {
        $this->setEndpoint("/user/getAccount/{$accountId}");
        
        $response = $this->send();
        return json_decode($response, true);
    }

    
    
    //------------------------------------------------------------------------------
    /**
     * Gets data associated with an Account
     *
     * @param int $accountId
     */
    //------------------------------------------------------------------------------
    public function transferFundsToMerchant($fromAccountId, $amount)
    {
        $this->setEndpoint("/group/transferFundsToMerchant/{$fromAccountId}/{$amount}");
        
        $response = $this->send();

        return json_decode($response, true);
    }



    //------------------------------------------------------------------------------
    /**
     * Gets data associated with an Account
     *
     * @param int $accountId
     */
    //------------------------------------------------------------------------------
    public function chargeCard($post)
    {
        $this->setEndpoint("/payments/chargeCard/");
        $this->post = $post;
        $response = $this->send();

        return json_decode($response, true);
    }



    //------------------------------------------------------------------------------
    /**
     * Gets data associated with an Account
     *
     * @param int $accountId
     */
    //------------------------------------------------------------------------------
    public function refundTransaction($post)
    {
        $this->setEndpoint("/payments/refundTransaction/");
        $this->post = $post;
        $response = $this->send();

        return json_decode($response, true);
    }


    public function achFX($post) {
        $this->setEndpoint("/payments/achFX/");
        $this->post = $post;
        $response = $this->send();

        return json_decode($response, true);
    }


    public function achFxBatch($post) {
        $this->setEndpoint("/payments/achFxBatch/");
        $this->post = $post;
        $response = $this->send();

        return json_decode($response, true);
    }


    public function chargeCup($post) {
        $this->setEndpoint("/payments/chargeCup/");
        $this->post = $post;
        $response = $this->send();

        return json_decode($response, true);
    }




    //------------------------------------------------------------------------------
    /**
     * Creates a Profile
     *
     * @param array $profileArray the profile data (key value pair)
     */
    //------------------------------------------------------------------------------
    public function createProfile($profileArray=array())
    {
        $this->setEndpoint("/user/createProfile/");
        $this->post = $profileArray;
        $response = $this->send();


        return json_decode($response, true);
    }




    //------------------------------------------------------------------------------
    /**
     * Loads a card
     *
     * @param int $accountId
     */
    //------------------------------------------------------------------------------
    public function getCountries()
    {
        $this->setEndpoint("/system/getCountries");

        $response = $this->send();

        print $response;
        return json_decode($response, true);
    }




    //------------------------------------------------------------------------------
    /**
     * Loads a card
     *
     * @param int $accountId
     */
    //------------------------------------------------------------------------------
    public function getStatesByCountryCode($countryCode)
    {
        $this->setEndpoint("/system/getStatesByCountryCode/{$countryCode}}");

        $response = $this->send();

        print $response;
        return json_decode($response, true);
    }

    /*
 * @param int amount, amount that we are charging
 * @param string trans_desc,
 * @param int track_id,last insert id from dpx_orders table
 * @return mixed
 */
    public function chargeBitCoin($amount, $trans_desc = '', $track_id)
    {
        $this->setEndpoint("/payments/chargeBitcoin/");

        $this->post = array(
            'amount' => $amount,
            'trans_desc' => $trans_desc,
            'track_id' => $track_id
        );

        $response = $this->send();

        return json_decode($response, true);
    }
    
    
    //------------------------------------------------------------------------------
    /**
     * Sends the request
     */
    //------------------------------------------------------------------------------
    private function send()
    {
        //set POST variables
        $auth = array('auth'=> array('apiUsername'=>$this->username, 'apiKey'=>$this->password));
        
        $this->post = array_merge($this->post, $auth);
        
        $postString = http_build_query($this->post);
        $url = $this->host . $this->getEndPoint();

        if (!empty($this->post['use_3d_secure'])) {
            print '<form action="' . $url . '" method="post" name="frm">';

            foreach ($this->post as $a => $b) {
                if (is_array($b)) {
                    foreach($b as $a2 => $b2) {
                        print '<input type="hidden" name="' . htmlentities($a) . '['. $a2 .']" value="' . htmlentities($b2) . '">';
                    }
                }
                else {
                    print "<input type='hidden' name='".htmlentities($a)."' value='".htmlentities($b)."'>";
                }

            }
            print '</form><script language="JavaScript">document.frm.submit();</script>';
            return;
        }


        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, count($this->post));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        if ($this->debug) {
            // CURLOPT_VERBOSE: TRUE to output verbose information. Writes output to STDERR,
            // or the file specified using CURLOPT_STDERR.
            curl_setopt($ch, CURLOPT_VERBOSE, true);

            $verbose = fopen('php://temp', 'rw+');
            curl_setopt($ch, CURLOPT_STDERR, $verbose);
        }
        
        //execute post
        $result = curl_exec($ch);

        if ($this->debug) {
            if ($result === FALSE) {
                printf("cUrl error (#%d): %s<br>\n", curl_errno($ch),
                    htmlspecialchars(curl_error($ch)));
            }

            rewind($verbose);
            $verboseLog = stream_get_contents($verbose);

            echo "Verbose information:\n<pre>", htmlspecialchars($verboseLog), "</pre>\n";


            print "--------------------------------------------------------------\n";
            print "Raw Response = \n";
            print $result;
            print "\n";
        }

        curl_close($ch);
        
        return $result;
    }
}