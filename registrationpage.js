function validateMyForm() {
    var uName = document.forms["myForm"]["username"].value;
    var pass1 = document.forms["myForm"]["password"].value;
    var pass2 = document.forms["myForm"]["password1"].value; 
    var email = document.forms["myForm"]["email"].value; 
    var phone = document.forms["myForm"]["phone"].value; 
    if (uName == "") {
        alert("Username must be filled out");
        return false;
    }
    if ((pass1 == "")||(pass2=="")) {
        alert("Password must be filled out");
        return false;
    }
    if(pass1 != pass2){
    	alert("confirm password doesn't match");
    	return false;
    }
    if ((email == "") && (phone="")){
        alert("Please enter either email or phone number");
        return false;
    }
}