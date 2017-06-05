$(document).ready(function(){
	$('#contact-form').on('submit',function(){
		fname = $("#fname").val();
		lname = $("#lname").val();
		phone = $("#phone").val();
		email = $("#email").val();
		pageName = $(".page-name").val();
		company=null;
		if($("#company").length > 0){
			company = $("#company").val();
		}
	  	$.ajax({
		  type: "post",
		  url: "sendMail.php",
		  data:{"fname":fname, "lname":lname, "company":company, "phone":phone, "email":email , "pageName":pageName },
		  success: function(response){
		  	if(response){
		  		$('#myModal').modal('show');
		  		$("#fname").val("");
		  		$("#lname").val("");
				$("#phone").val("");
				$("#email").val("");
				if($("#company").length > 0){
					company = $("#company").val("");
				}
		  	}
		  	else{
		  		alert("Technical error: Please try after some time.");
		  	}
		  }
		});
		return false;
	})
})