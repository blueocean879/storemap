<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends UR_Controller {
	public function __construct(){
		parent::__construct();
	//	$this->load->model('user_model', 'user_model');
	}
	//-------------------------------------------------------------------------
	public function index(){
		if($this->input->post('submit')){
		/*	$data = array(
				'username' => $this->input->post('username'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'mobile_no' => $this->input->post('mobile_no'),
				'updated_at' => date('Y-m-d : h:m:s'),
			);
			$data = $this->security->xss_clean($data);
			$result = $this->user_model->update_user($data);
			if($result){
				$this->session->set_flashdata('msg', 'Profile has been Updated Successfully!');
				redirect(base_url('profile'), 'refresh');
			}*/
		}
		else{
			$data['title'] = 'StoreMapper Billing';
			$data['view'] = 'user/payment/index';
			$this->load->view('layout_user', $data);
		}
	}

	public function process_payment(){
		if(!empty($_POST['stripeToken'])){
		    //get token, card and user info from the form
		    $token  = $_POST['stripeToken'];
		    $name = $_POST['name'];
		    $email = $_POST['email'];
		    $card_num = $_POST['card_num'];
		    $card_cvc = $_POST['cvc'];
		    $card_exp_month = $_POST['exp_month'];
		    $card_exp_year = $_POST['exp_year'];
		    
		    //include Stripe PHP library
		    require_once APPPATH."third_party/stripe/init.php";
		    
		    //set api key
		    $stripe = array(
		      "secret_key"      => 'sk_test_fyjnPgb1Zib2XtOUKFrBTfrc',
		      "publishable_key" => 'pk_test_cFdGhW5sDWhHOv1gl0N4Ip8o',
		    );
		    
		    \Stripe\Stripe::setApiKey($stripe['secret_key']);
		    
		    //add customer to stripe
		    $customer = \Stripe\Customer::create(array(
		        'email' => $email,
		        'source'  => $token
		    ));
		    
		    //item information
		    $itemName = "Premium Script CodexWorld";
		    $itemNumber = "PS123456";
		    $itemPrice = 55;
		    $currency = "usd";
		    $orderID = "SKA92712382139";
		    
		    //charge a credit or a debit card
		    $charge = \Stripe\Charge::create(array(
		        'customer' => $customer->id,
		        'amount'   => $itemPrice,
		        'currency' => $currency,
		        'description' => $itemName,
		        'metadata' => array(
		            'order_id' => $orderID
		        )
		    ));
		    
		    //retrieve charge details
		    $chargeJson = $charge->jsonSerialize();
		    //check whether the charge is successful
		    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
		        //order details 
		        $amount = $chargeJson['amount'];
		        $balance_transaction = $chargeJson['balance_transaction'];
		        $currency = $chargeJson['currency'];
		        $status = $chargeJson['status'];
		        $date = date("Y-m-d H:i:s");
		        
		        
		        //insert tansaction data into the database
		        $sql = "INSERT INTO orders(name,email,card_num,card_cvc,card_exp_month,card_exp_year,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,created,modified) VALUES('".$name."','".$email."','".$card_num."','".$card_cvc."','".$card_exp_month."','".$card_exp_year."','".$itemName."','".$itemNumber."','".$itemPrice."','".$currency."','".$amount."','".$currency."','".$balance_transaction."','".$status."','".$date."','".$date."')";

		        $this->db->query($sql);
		        $last_insert_id = $this->db->insert_id();
		        
		        //if order inserted successfully
		        if($last_insert_id && $status == 'succeeded'){
		            $statusMsg = "<h2>The transaction was successful.</h2><h4>Order ID: {$last_insert_id}</h4>";
		        }else{
		            $statusMsg = "Transaction has been failed";
		        }
		    }else{
		        $statusMsg = "Transaction has been failed";
		    }
		}else{
		    $statusMsg = "Form submission error.......";
		}

		//show success or error message
		echo $statusMsg;
		exit;
	}
	
}

?>	