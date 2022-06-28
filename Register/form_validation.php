<?php include "common/header.php";?> 
<!-- /.navbar -->

<script src="js/script.js"></script>

<!-- Main Sidebar Container -->
<?php include "common/left_menu.php";?> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Project Add</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <form method="post" action="main_function.php" onsubmit="return(validateForm())">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
							<div class="form-group">
								<label for="inputName">First name</label>
								<input type="text" name="first name" id="f_name" class="form-control" placeholder="Enter your first name">
								<span class="error_msg text-danger font-weight-bold" id="first-name-error"></span>
							</div>
							<div class="form-group">
								<label for="inputName">Last name</label>
								<input type="text" name="last name" id="l_name" class="form-control" placeholder="Enter your last name">
                                <span class="error_msg text-danger font-weight-bold" id="last-name-error"></span>
							</div>
							<div class="form-group">
								<label for="inputName">Email</label>
								<input type="text" name="email" id="email" class="form-control" placeholder="Enter your email">
                                <span class="error_msg text-danger font-weight-bold" id="email-error"></span>

							</div>
							<div class="form-group">
								<label for="inputName">Mobile</label>
								<input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your mobile number">
                                <span class="error_msg text-danger font-weight-bold" id="phone-error"></span>

							</div>
							<div class="form-group">
								<label for="inputName">Address</label>
								<input type="text" name="address" id="address" class="form-control" placeholder="Enter your address">
                                <span class="error_msg text-danger font-weight-bold" id="address-error"></span>
                                 
							</div>
							<div class="form-group">
								<label for="inputName">Pincode</label>
								<input type="text" name="pincode" id="pincode" class="form-control" placeholder="Enter your pincode">
                                <span class="error_msg text-danger font-weight-bold" id="pincode-error"></span>
							</div>
						</div>
                    <!-- <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">First Name</label>
                            <input type="text" name="first name" id="f_Name" class="form-control" placeholder="First name">
                            <span id="firstname" class="error_msg text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Last Name</label>
                            <input type="text" name="last name" id="l_Name" class="form-control" placeholder="Last name">
                            <span id="lastname" class="error_msg text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email address"></input>
                            <span id="emailaddress" class="error_msg text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputPhone">Mobile</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Mobile number">
                            <span id="phonenumber" class="error_msg text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <textarea type="text" id="address" name="address" class="form-control" rows="4" placeholder="Address"></textarea>
                            <span id="addressadd" class="error_msg text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputPinCode">Pincode</label>
                            <input type="text" name="pincode" id="inputPinCode" class="form-control" placeholder="Pincode">
                            <span id="pinnum" class="error_msg text-danger font-weight-bold"></span>
                        </div>
                    </div> -->
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            
        </div>
        <div class="row">
            <div class="col-12">
                <a href="project.php" class="btn btn-secondary">Cancel</a>
                <input class="btn btn-success float-right" type="submit" name="submit" value="submit">
            </div>
        </div>
        </form>

    </section>
    <!-- Control Sidebar -->
    <?php include "common/right_menu.php";?> 
</div>
<!-- ./wrapper -->
<?php include "common/footer.php"; ?>

<script>

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

        // First validation
        if (f_name == "") {
            document.getElementById("first-name-error").innerHTML =
                "** First name is required.";
            return false;
        } else {
            if (!f_name.match(/^[a-z]+$/)) {
                document.getElementById("first-name-error").innerHTML =
                    "** First name is invalid.";
                return false;
        }

        // Last validation
        if (l_name == "") {
            document.getElementById("last-name-error").innerHTML =
                "** Last name is required.";
            return false;
        } else {
            if (!l_name.match(/^[a-z]+$/)) {
                document.getElementById("last-name-error").innerHTML =
                    "** Last name is invalid.";
                return false;
            }
        }
        // Email validation
        if (email == "") {
            document.getElementById("email-error").innerHTML = "** Email is required.";
            return false;
        } else {
            if (!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
                document.getElementById("email-error").innerHTML = "** Email is invalid.";
                return false;
            }
        }
        // Phone validation
        if (phone == "") {
            document.getElementById("phone-error").innerHTML = "** Phone no. is required.";
            return false;
        } else {
            if (!phone.match(/^[0-9]{10}$/)) {
                document.getElementById("phone-error").innerHTML =
                    "** Phone no. is invalid.";
                return false;
            }
        }
         // Address validation
        if (address == "") {
            document.getElementById("address-error").innerHTML = "** Address is required.";
            return false;
        } else {
            if (!address.match(/^[0-9a-zA-Z]/)) {
                    document.getElementById("address-error").innerHTML =
                        "** Address is invalid.";
                    return false;
        }

        //pincode validation
        if (pincode == "") {
            document.getElementById("pincode-error").innerHTML = "** Pincode is required.";
            return false;
        } else {
            if (!pincode.match(/^[0-9]{6}$/)) {
                document.getElementById("pincode-error").innerHTML =
                    "** Pincode is invalid.";
                return false;
            }
        }
        return true;
    }
}

// setTimeout(() => {
 //     document.getElementByIdClassName("error_msg").innerHtml = "";
// }, 5000);


// function validateForm() {

  //   var f_name = document.getElementById("f_Name").value;
  //   var l_name = document.getElementById("l_Name").value;
  //   var email = document.getElementById("email").value;
  //   var phone = document.getElementById("phone").value;
  //   var address = document.getElementById("address").value;
  //   var pincode = document.getElementById("pincode").value;

   //first name validation
    // if (f_name == "") {
    //     document.getElementById('firstname').innerHTML = "** Please filed the First name";
    //     return false;
    // }
    // if((f_name.length <= 2) || (f_name.length > 20)) {
    //     document.getElementById('firstname').innerHTML = "** First name length must be between 2 and 20";
    //     return false;
    // }
    // if(!isNAN(f_name)){
    //     document.getElementById('firstname').innerHTML = "** Only character are allowed";
    //     return false;
    // }

    //last name validation

    // if (l_name == "") {
    //     document.getElementById('lastname').innerHTML = "** Please filed the Last name";
    //     return false;
    // }
    // if((l_name.length <= 2) || (l_name.length > 20)){
    //     document.getElementById('lastname').innerHTML = "** Last name length must be between 2 and 20";
    //     return false;
    // }
    // if(!isNAN(l_name)){
    //     document.getElementById('lastname').innerHTML = "** Only character are allowed";
    //     return false;
    // }
    //email validation


    // if (email == ""){
    //     document.getElementById('emailaddress').innerHTML = "** Please filed the Email";
    //     return false;
    // }
    // if(email.indexOf('@') <= 0 ){
    //     document.getElementById('emailaddress').innerHTML = "** @ Invalid Position";
    //     return false;
    // }
    // if(email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.'){
    // document.getElementById('emailaddress').innerHTML = "* . Invalid Position";
    //     return false;
    // }

    //phone validation


    // if (phone == ""){
    //     document.getElementById('phonenumber').innerHTML = "** Please filed the Mobile number";
    //     return false;
    // }
    // if(isNAN(phone)){
    //     document.getElementById('phonenumber').innerHTML = "** User must write digits only not characters";
    //     return false;
    // }
    // if(phone.length!=10){
    //     document.getElementById('phonenumber').innerHTML = "** Mobile number must be 10 digits only.";
    //     return false;
    // }

    //address validation

    // if (address == "") {
    //     document.getElementById('addressadd').innerHTML = "** Please filed the Address";
    //     return false;
    // }

    //Pincode validation

    //     if (pincode == "") {
    //         document.getElementById('pinnum').innerHTML = "** Please filed the Pincode";
    //         return false;
    //     }
    //     if(isNAN(phone)){
    //         document.getElementById('pinnum').innerHTML = "** Pincode must write digits only not characters";
    //         return false;
    //     }
    //     if(phone.length!=6){
    //         document.getElementById('pinnum').innerHTML = "** Pincode must be 10 digits only.";
    //         return false;
    //     }


//  }
//     </script>
