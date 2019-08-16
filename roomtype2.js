function validateMyForm() {
    var name = document.forms["myForm"]["roomname"].value;
    if (name == "") {
        alert("Specify the name of your room");
        return false;
    }
}