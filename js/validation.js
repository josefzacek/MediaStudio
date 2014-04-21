
$(document).ready(function(){

required = ["name", "email", "message"];
email = $("#email");
errornotice = $("#error");
emptyerror = "Please fill out this field.";
emailerror = "Please enter a valid e-mail.";

$("#theform").submit(function(){	

for (i=0;i<required.length;i++) {
var input = $('#'+required[i]);
if ((input.val() == "") || (input.val() == emptyerror)) {
input.addClass("needsfilled");
input.val(emptyerror);
errornotice.fadeIn(750);
} else {
input.removeClass("needsfilled");
}
}

// Validate the e-mail.
if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email.val())) {
email.addClass("needsfilled");
email.val(emailerror);
}

//if any inputs on the page have the class 'needsfilled' the form will not submit
if ($(":input").hasClass("needsfilled")) {
return false;
} else {
errornotice.hide();
return true;
}
});
	
// Clears any fields in the form when the user clicks on them
$(":input").focus(function(){		
if ($(this).hasClass("needsfilled") ) {
$(this).val("");
$(this).removeClass("needsfilled");
}
});
});	