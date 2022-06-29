<?php 
  require_once('common/header-login.php');
?>

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
    <!-- <div class="message bg-green text-center">
            <?php 
                if( isset( $_SESSION["message"] ) ) {
                    echo "<p>". $_SESSION["message"] . "</p>";
                    unset($_SESSION["message"]);
                   }
                 ?> 
        </div> -->
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


<?php 
  require_once('common/footer-login.php');
?>