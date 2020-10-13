<?php

/************************************
         DATABASE FUNCTIONS
 ************************************/
// require( config.php );


/*
class db {
	protected $cn='';
	public $result='';
	public $show_errors=true;

	function db() {
		$this->cn=@mysql_connect( DB_HOST, DB_USER, DB_PASS);
		mysql_select_db( DB_NAME );
	}

	function query( $query ) {
		$select=mysql_query( $query,$this->cn );
		if ( is_resource( $select ) ) {
			while ( $rowselect=mysql_fetch_object( $select ) ) {
				$results[]=$rowselect;
			}
		}
		if ( !empty( $results ) ) {
			return $results;
		} else {
			$this->handle_error();
			return false;
		}
	}

	function query_one( $query ) {
		$select=mysql_query( $query,$this->cn );
		if ( is_resource( $select ) ) {
			while ( $rowselect=mysql_fetch_object( $select ) ) {
				$results[]=$rowselect;
			}
		}
		if ( !empty( $results ) ) {
			return $results[0];
		} else {
			$this->handle_error();
			return false;
		}
	}

	function update( $query ) {
		$update=mysql_query( $query, $this->cn );
		if ( $update ) {
			return true;
		} else {
			$this->handle_error();
			return false;
		}
	}

	function insert( $query ) {
		$update=mysql_query( $query, $this->cn );
		if ( $update ) {
			return mysql_insert_id();
		} else {
			$this->handle_error();
			return false;
		}
	}

	function handle_error() {
		$error=mysql_error();
		if ( !empty( $error ) && $this->show_errors ) {
			print $error;
			die;
		}
	}

}

global $db;
$db=new db();


$domain=str_replace( "www.", "", $_SERVER["HTTP_HOST"] );
if ( stristr( $domain, ".my" ) ) $subdomain=str_replace( ".myautorebate.com", "", $domain ); 
if ( isset( $subdomain ) ) {
	$get_name=$db->query_one("SELECT * FROM `users` WHERE `slug` LIKE \"" . $subdomain . "\";");
	if ( !empty( $get_name ) ) {
		$name=ucfirst(strtolower($get_name->fname));
	}
}
*/

?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>My Auto Rebate</title>
	<meta name="description" content="My auto rebate.">
	<meta name="author" content="FAA ECU">	
	<link rel="stylesheet" href="css/main.css">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div id="container" class="wrapper">
		<div id="header">
			<a href="/"><img src="img/header.png" /></a>
		</div>
		<div id="content">
			<div id="home">
				<div id="yellow-stripe">
					<p>Compare auto loans you
					have at other financial
					institutions to FAA Credit
					Union and see how much
					we can save you!</p>
					<p>Plus, you’ll earn a 1% cash
					rebate up to $500.</p>
					<p>Go on. Put us to the test.</p>
				</div>
				<div id="calculator">
					<img src="img/header-calculator.jpg" class="header" />
					<p>Current Loan Balance:<br />
						<input type="text" id="balance" value="5000" class="numbers-only" /></p>
					<p>Remaining Term (in Months):<br />
						<input type="text" id="term" value="48" class="numbers-only" /></p>
					<p>Annual Percentage Rate (APR):<br />
						<input type="text" id="rate" value="5.99" class="numbers-only" /></p>
					<p class="center"><img src="img/save-button.png" id="calculate" /></p>
				</div>
			</div>
			<div id="results">
				<h1>Congratulations!</h1>
				<h2>You can save as much as $<span id="total"></span>!</h2>
				<h3>$<span id="savings"></span> in interest, $<span id="rebate"></span> cash rebate</h3>
				<a href="http://www.faaecu.org/contact/contact-me-form"><img src="img/bg-result-button.png" id="save-more-button" /></a>
			</div>
		</div>
	</div>
	<div id="footer">
		<div class="wrapper">
			<div class="half">
				<a href="http://www.faaecu.org/"><img src="img/logo-footer.png" /></a>
			</div>
			<div class="half">
				<h4>Lower your payments today!</h4>
				<h2>(405) 682-1990</h2>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div id="subfooter" class="wrapper">
		<p>*Auto loan must be $5,000 or more to qualify for rebate. Rebate maximum is $500. Rebate will be 
			deposited into the s1 savings account at FAA Credit union. Not valid on current FAA Credit
			Union Loans. Must meet certain credit criteria. Terms and conditions must be met to get above stated 
			rate and include automatic payments. Savings will vary. FAA Credit Union is federally
			insured by NCUA. Rates as low as 1.99% APR. You may or may not qualify for the lowest rate. Actual 
			rate may be higher based on terms, collateral and other criteria. Rates subject to change. All 
			lending policies apply. At stated rate of 1.99% with a term of 36 months the payment is $28.64 
			per $1,000 borrowed. For rate of 2.24% APR with a term of 60 months the payment would be $17.64 
			per $1,000 borrowed. Rates are subject to change at anytime and without notice. If loan is not 
			in good standing for a period of at least 6 months, reimbursement of the rebate will be required 
			as part of the payoff of the loan. Other conditions may apply. Interest savings is an estimate 
			and actual amount may vary.</p>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-38315794-4', 'myautorebate.com');
	ga('send', 'pageview');

	</script>
</body>
</html>