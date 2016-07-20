//seach form validation ------
function validate(){
		var search = document.getElementById('search').value;
		if(search == ''){
			$(".error").html("Please enter hall name!!!");
			$(".error").css("color","red");
			return false;
		}
}


//seach form sign up validation ------
function signup_validate(){
		var hall_name = document.getElementById('hall_name').value;
		var username = document.getElementById('username').value;
		var email = document.getElementById('email').value;
		var password = document.getElementById('password').value;
		var phone_no = document.getElementById('phone_no').value;
		if(hall_name == '' || username == '' || email == '' || password == '' || phone_no == ''){
			$(".error").css("border","solid 1px red");
			return false;
		}
}


//create function for validation -----------
$(function(){
$(".form_validation").click(function(){
	
	var error_msg="";

	$(".error_validate").each(function(){
	if($(this).val()==""){
	    error_msg += "<div class='alert alert-danger error_val' role='alert'>"+$(this).attr("error_msg")+"</div> ";
		$(this).css({"border": "1px solid red"});
	} else if($(this).attr("type")=="email"){
		var thisVal = $(this).val();		
		var emailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		
		if(!emailRegex.test(thisVal)){
		 error_msg += "<div class='alert alert-danger error_val' role='alert'>Please enter valid email id</div> ";
		$(this).css({"border": "1px solid red"});
		}else{
			$(this).css({"border": ""});
		}   
	} else if($(this).attr("type")=="phone"){
		var phoneVal = $(this).val();		
		var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
		
		if(!phoneno.test(phoneVal)){
		 error_msg += "<div class='alert alert-danger error_val' role='alert'>Please enter valid Contact No.</div> ";
		$(this).css({"border": "1px solid red"});
		}else{
			$(this).css({"border": ""});
		}   
	}
	else{
		$(this).css({"border": ""});
		}
	});	
	
	if(error_msg!=""){
		$(".alert_for_error_msg").show();
		$(".alert_for_error_msg").html(error_msg);
		return false;
	}
});	
});


//contact form validation
$(document).ready(function(){
	$("#hall_form").validate({
		rules: {
			name: {
				required: true
			},
            email: {
                required: true,
                email: true
            },
			phone_number: {
				required: true
			},
            datepicker: {
                required: true,
                date: true
            },	
            datepicker1: {
                required: true,
                date: true
            },
           bid_price: {
                required: true,
                digits: true
            },            	            		
		},
		
		messages: {
			name: "Please enter your name",
			email: "Please enter a valid email address",
			phone_number: "Please enter mobile number",
			datepicker: {
				required: " * required: You must enter a destruction date",
				date: "Can contain digits only"
			}, 
			datepicker1:{
				required: " * required: You must enter a destruction date",
				date: "Can contain digits only"
			},
			bid_price: "Please enter price",
		},
		
		submitHandler: function(form) {
            form.submit();
        }
	});
});


//not a hall owner form validation
$(document).ready(function(){
	$("#notowner_form").validate({
		rules: {
			hall_name: {
				required: true
			},
			
			address: {
				required: true
			},
            estimated_price: {
                required: true,
                digits: true
            }, 
            capacity: {
                required: true,
                digits: true
            },               			
            email: {
                required: false,
                email: false
            },
			mobile: {
				required: false
			}
          	            		
		},
		
		messages: {
			hall_name: "Please enter hall name",
			address: "Please enter address",
			estimated_price: "Please enter price",			
			capacity: "Please enter capacity",			
			email: "Please enter a valid email address",
			mobile: "Please enter mobile "

		},
		
		submitHandler: function(form) {
            form.submit();
        }
	});
});


//hall owner form validation
$(document).ready(function(){
	$("#signup_form").validate({
		rules: {
			hall_name: {
				required: true
			},
			username: {
				required: true
			},
			email: {
                required: true,
                email: true
			},			
			password: {
				required: true
			},			
			phone_no: {
				required: true
			}			
          	            		
		},
		
		messages: {
			hall_name: "Please enter hall name",
			username: "Please enter username",
			email: "Please enter email",
			password: "Please enter password ",
			phone_no: "Please enter phone "

		},
		
		submitHandler: function(form) {
            form.submit();
        }
	});
});



//blog form validation
$(document).ready(function(){
	$("#blog_form").validate({
		rules: {
			name: {
				required: true
			},
			email: {
                required: true,
                email: true
			},			
			message: {
				required: true
			}		
          	            		
		},
		
		messages: {
			name: "Please enter name",
			email: "Please enter email",
			message: "Please enter message "

		},
		
		submitHandler: function(form) {
            form.submit();
        }
	});
});
