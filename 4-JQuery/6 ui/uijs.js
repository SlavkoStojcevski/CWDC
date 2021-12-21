function isEmail(email) {
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
}
$("#submitButton").click(function(){
	var errorMessage="";
	if($("#email").val()){
		if(isEmail($("#email").val())==false){
			errorMessage+="<p>Yor email adress is not valid</p>";
		}
	} 
	else{
		errorMessage+="<p>Yor email adress is missing</p>";
	}
	if ($("#phone").val()) {
		if($.isNumeric($("#phone").val())==false){
			errorMessage+="<p>Yor phone number is not numeric</p>";
		}
	} 
	else{
		errorMessage+="<p>Yor phone number is missing</p>";
	}
	if ($("#password").val()) {
		if($("#passwordConfirm").val()){
			if($("#password").val()!=$("#passwordConfirm").val()){
				errorMessage+="<p>Yor passwords don't match.</p>";
			}
		}
		else{
			errorMessage+="<p>Please confirm your password.</p>";
		}
	} else{
		errorMessage+="<p>Your password is missing</p>";
	}
	if(errorMessage==""){
		errorMessage+="Thank you for signing up :)"+"<br>"+"Drag the green square on the red square.";
		$("#missing_input").css({'color':'green'});
		$("#human_check").css({'visibility':'visible'});
		$("#human_check1").css({'visibility':'visible'});
		$("#human_check").draggable();
		$("#human_check1").draggable();
	}
	$("#missing_input").html(errorMessage);
	var po=$("#human_check").css('top');
	var pos=parseInt($("#human_check").css('top'));
	alert(po,pos);
});