setTimeout(() => {
    document.getElementByIdClassName("error_msg").innerHtml = "";
}, 5000);

function validateForm() {
    var f_name = document.getElementById("f_name").value;
    var l_name = document.getElementById("l_name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var address = document.getElementById("address").value;
    var pincode = document.getElementById("pincode").value;

    if (f_name == "") {
        document.getElementById("first-name-error").innerHTML =
            "First name is required.";
        return false;
    } else {
        if (!f_name.match(/^[a-z]+$/)) {
            document.getElementById("first-name-error").innerHTML =
                "First name is invalid.";
            return false;
        }
    }

    if (l_name == "") {
        document.getElementById("last-name-error").innerHTML =
            "Last name is required.";
        return false;
    } else {
        if (!l_name.match(/^[a-z]+$/)) {
            document.getElementById("last-name-error").innerHTML =
                "Last name is invalid.";
            return false;
        }
    }

    if (email == "") {
        document.getElementById("email-error").innerHTML = "Email is required.";
        return false;
    } else {
        if (!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
            document.getElementById("email-error").innerHTML = "email is invalid.";
            return false;
        }
    }

    if (phone == "") {
        document.getElementById("phone-error").innerHTML = "phone no. is required.";
        return false;
    } else {
        if (!phone.match(/^[0-9]{10}$/)) {
            document.getElementById("phone-error").innerHTML =
                "phone no. is invalid.";
            return false;
        }
    }

    if (address == "") {
        document.getElementById("address-error").innerHTML = "Address is required.";
        return false;
    } else {}

    if (pincode == "") {
        document.getElementById("pincode-error").innerHTML = "pincode is required.";
        return false;
    } else {
        if (!pincode.match(/^[0-9]{6}$/)) {
            document.getElementById("pincode-error").innerHTML =
                "pincode is invalid.";
            return false;
        }
    }
    return true;
}