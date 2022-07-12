<?php include "common/header.php";?> 

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
    <div class="message bg-green text-center">
            <?php
                if( isset( $_SESSION["message"] ) ) {
                    echo "<p>". $_SESSION["message"] . "</p>";
                    unset($_SESSION["message"]);
                   }
                 ?> 
        </div>
      <form method="post" action="<?php echo base_url();?>/add_project" onsubmit="return(validateForm())">
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
                            <label for="inputName">Project Name</label>
                            <input type="text" name="project_name" id="projects_name" class="form-control">
                            <span class="error_msg text-danger font-weight-bold" id="pro-name-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Project Description</label>
                            <textarea id="projects_desc" name="project_desc" class="form-control" rows="4"></textarea>
                            <span class="error_msg text-danger font-weight-bold" id="pro-desc-error"></span>

                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select id="pro_status" class="form-control custom-select" name="project_status">
                                <option selected disabled>Select one</option>
                                <option value="1">On Hold</option>
                                <option value="2">Canceled</option>
                                <option value="3">Success</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany">Client Company</label>
                            <input type="text" name="client_company" id="client_companies" class="form-control">
                            <span class="error_msg text-danger font-weight-bold" id="client-company-error"></span>

                        </div>
                        <div class="form-group">
                            <label for="inputProjectLeader">Project Leader</label>
                            <input type="text" name="project_leader" id="pro_leader" class="form-control">
                            <span class="error_msg text-danger font-weight-bold" id="pro-leader-error"></span>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Budget</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEstimatedBudget">Estimated budget</label>
                            <input type="number" name="estimated_budget" id="estimated_budgets" class="form-control">
                            <span class="error_msg text-danger font-weight-bold" id="estimated-budget-error"></span>

                        </div>
                        <div class="form-group">
                            <label for="inputSpentBudget">Total amount spent</label>
                            <input type="number" name="total_amount" id="Spent_Budget" class="form-control">
                            <span class="error_msg text-danger font-weight-bold" id="spend-budget-error"></span>

                        </div>
                        <div class="form-group">
                            <label for="inputEstimatedDuration">Estimated project duration</label>
                            <input type="number" name="estimated_project_duration" id="estimated_duration" class="form-control">
                            <span class="error_msg text-danger font-weight-bold" id="estimated-duration-error"></span>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="project.php" class="btn btn-secondary">Cancel</a>
                <button class="btn btn-success float-right" type="submit" name="create_user">
                Submit
                </button>
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
        var projects_name = document.getElementById("projects_name").value;
        var projects_desc = document.getElementById("projects_desc").value;
        // var status = document.getElementById("status").value;
        var client_companies = document.getElementById("client_companies").value;
        var pro_leader = document.getElementById("pro_leader").value;
        var estimated_budgets = document.getElementById("estimated_budgets").value;
        var Spent_Budget = document.getElementById("Spent_Budget").value;
        var estimated_duration = document.getElementById("estimated_duration").value;


            // Project Name validation
            if (projects_name == "") {
                document.getElementById("pro-name-error").innerHTML =
                    "** Project name is required.";
                return false;
            } else {
                if (!projects_name.match(/^[0-9a-zA-Z]/)) {
                    document.getElementById("pro-name-error").innerHTML =
                        "** Project name is invalid.";
                    return false;
            }

            // Project Description validation
            if (projects_desc == "") {
                document.getElementById("pro-desc-error").innerHTML =
                    "** Project description is required.";
                return false;
            } else {
                if (!projects_desc.match(/^[A-Za-z]/)) {
                    document.getElementById("pro-desc-error").innerHTML =
                        "** Project description is invalid.";
                    return false;
                }
            }
            // Status validation
            






            // Client company validation

            if (client_companies == "") {
                document.getElementById("client-company-error").innerHTML =
                    "** Client company name is required.";
                return false;
            } else {
                if (!client_companies.match(/^[A-Za-z]/)) {
                    document.getElementById("client-company-error").innerHTML =
                        "** Client company name is invalid.";
                    return false;
                }
            }


            // Project leader validation

            if (pro_leader == "") {
                document.getElementById("pro-leader-error").innerHTML = "** Project leader name is required.";
                return false;
            } else {
                if (!pro_leader.match(/^[A-Za-z]/)) {
                    document.getElementById("pro-leader-error").innerHTML =
                        "** Project leader name is invalid.";
                    return false;
                }
            }

            //estimated budget validation


            if (estimated_budgets == "") {
                document.getElementById("estimated-budget-error").innerHTML = "** Estimated Budget is required.";
                return false;
            } else {
                if (!estimated_budgets.match(/^\d+/)) {
                    document.getElementById("estimated-budget-error").innerHTML =
                        "** Estimated budget is invalid.";
                    return false;
                }
            }

        //estimated total spend budget validation


        if (Spent_Budget == "") {
                document.getElementById("spend-budget-error").innerHTML = "** Total amount is required.";
                return false;
            } else {
                if (!Spent_Budget.match(/^\d+/)) {
                    document.getElementById("spend-budget-error").innerHTML =
                        "** Total amount is invalid.";
                    return false;
                }
            }

        //Estimated Duration validation


        if (estimated_duration == "") {
                document.getElementById("estimated-duration-error").innerHTML = "** Project duration is required.";
                return false;
            } else {
                if (!estimated_duration.match(/^\d+/)) {
                    document.getElementById("estimated-duration-error").innerHTML =
                        "** Project duration is invalid.";
                    return false;
                }
            }
            return true;
    }

    }


</script>
