function validateMyForm() {
    var house = document.forms["myForm"]["house"].value;
    var street = document.forms["myForm"]["street"].value;
    var city = document.forms["myForm"]["city"].value; 
    var pincode = document.forms["myForm"]["pincode"].value; 
    var country = document.forms["myForm"]["country"].value; 
    if (house == "") {
        alert("House no must be filled out");
        return false;
    }
    if (street == "") {
        alert("Street must be filled out");
        return false;
    }
    if (city == "") {
        alert("City must be filled out");
        return false;
    }
    if (pincode == "") {
        alert("Pincode must be filled out");
        return false;
    }
    if (country == "") {
        alert("Country must be filled out");
        return false;
    }
}