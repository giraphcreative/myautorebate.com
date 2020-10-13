function api_call( action, params, callback ) {
	$.post( "/calculate.php?action="+action+"&"+params, function(data){
		callback(data);
	});
}

function calculate(){
	var balance=$("#balance").val(),
		rate=$("#rate").val(),
		term=$("#term").val();
	$.post( "calculate.php?balance="+balance+"&rate="+rate+"&term="+term, function(data){
		if ( data!=="Error" ) {
			var loans=$.parseJSON( data );
			console.log( loans );
			var total=loans.savings+loans.rebate;
			console.log( total );
			$("#total").html( total.toFixed(2) );
			$("#savings").html( loans.savings.toFixed(2) );
			$("#rebate").html( loans.rebate.toFixed(2) );
			$("#cu_payment").html( "$"+loans.cu_loan_info.monthly_payment.toFixed(2) );
			$("#cu_interest").html( "$"+loans.cu_loan_info.total_interest.toFixed(2) );
			$("#bank_payment").html( "$"+loans.bank_loan_info.monthly_payment.toFixed(2) );
			$("#bank_interest").html( "$"+loans.bank_loan_info.total_interest.toFixed(2) );
			$("#home").fadeOut( 1000 );
			$("#results").fadeIn( 1000 );
		}
	});
};

$(document).ready(function(){
	
	$("#calculate").click( calculate );

	$("input").keypress(function(e) {
	    if(e.which == 13) {
	        calculate();
	    }
	});

	$(".numbers-only").keyup(function(){
		if ( $(this).val().match(/[^0-9\.]/) ) {
			$(this).val( $(this).val().replace(/[^0-9\.]+/g, '') );
		}
	});

	$("#back").click(function(){
		$("#results").slideUp( 1000 );
		$("#tool").slideDown( 1000 );
		$("#banner h1").html("We'll beat your auto loan payment!");
	});

});