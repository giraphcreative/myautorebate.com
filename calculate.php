<?php
/**************************************************************
   
    RATES
    We'll set the Baylands rate based on the term they
    provide.
	
 **************************************************************/

$rates=array(
	"36" => "1.99",
	"72" => "2.24",
	"78" => "3.49",
	"84" => "3.69"
);




/**************************************************************
   
    REQUEST HELPER:
    Just to quickly grab request vars and set a default
    value if they're not set.
	
 **************************************************************/
function request( $param, $default="" ) {
	return ( isset( $_REQUEST[$param] ) ? $_REQUEST[$param] : ( !empty( $default ) ? $default : "" ) );
}


/**************************************************************
   
    LOAN FUNCTIONS
	
 **************************************************************/
function get_loan_info( $amount=0, $rate=0, $term=0 ) {
	if ( $amount*$rate*$term > 0 ) {
		$mrate=$rate/1200; //monthly interest rate
		$pmnt=$amount*($mrate/(1-pow(1+$mrate,-$term))); //monthly payment
		$tpmnt=$pmnt * $term; //total amount paid at end of loan
		$tint=$tpmnt-$amount; //total amount of interest paid at end of loan
		return (object) array(
			"total_payments" => $tpmnt,
			"total_interest" => $tint,
			"number_payments" => $term,
			"monthly_payment" => $pmnt 
		);
	} else {
		return false;
	}
}


// Savings calculation
function get_savings( $amount=0, $cu_rate=0, $bank_rate=0, $term=12 ) {
	$cu_loan_info=get_loan_info( $amount, $cu_rate, $term );
	$bank_loan_info=get_loan_info( $amount, $bank_rate, $term );
	$rebate=( $amount*.01 );
	if ( $rebate>500 ) $rebate=500;
	print json_encode( (object) array(
		"savings"=>( $bank_loan_info->total_interest - $cu_loan_info->total_interest ),
		"cu_loan_info"=>$cu_loan_info,
		"bank_loan_info"=>$bank_loan_info,
		"rebate"=>$rebate
	) );
}


// Format number as a dollar amount
function format_number( $number ) {
	return number_format( $number, 2, ".", "," );
}




/**************************************************************
   
    HANDLE CALCULATION REQUESTS
	
 **************************************************************/
$balance=request("balance");
$rate=request("rate");
$term=request("term");
foreach ( $rates as $a_month=>$a_rate ) {
	if ( $term<$a_month ) {
		$cu_rate=$a_rate;
	}
}

if ( $balance * $rate * $term * $cu_rate !=0 ) {
	// get the savings.
	$savings=get_savings( $balance, $cu_rate, $rate, $term );   //make an instance of amort and set the numbers
	if ( $savings ) print $savings;
} else {
	print "Error";
}




?>