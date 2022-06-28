<?php 
include "common/header.php"; 

if($_GET['project_id'] != ''){
    $project_id = $_GET['project_id'];
    
    $get_project = "SELECT * FROM tbl_projects WHERE id=$project_id";

    $res = $mysqli->query($get_project);

    $row = $res->fetch_assoc();

}else{
    header("Location: project.php");
    die;
}
 
?>

<!-- /.navbar -->
<!-- Main Sidebar Container -->
<?php include "common/left_menu.php"; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Project Edit</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <form method="post" action="main_function.php">
            <input type="hidden" name="id" value="<?php echo $_GET['project_id']; ?>" >
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
                                <input type="text" name="project_name" id="inputName" class="form-control" value="<?php echo $row['project_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Project Description</label>
                                <textarea id="inputDescription" name="project_desc" class="form-control" rows="4"><?php echo $row['project_desc']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select id="inputStatus" class="form-control custom-select">
                                    <option disabled>Select one</option>
                                    <option value="1" <?php if($row['status'] == 1){ echo "selected"; } ?>>On Hold</option>
                                    <option value="2" <?php if($row['status'] == 2){ echo "selected"; } ?>>Canceled</option>
                                    <option value="3" <?php if($row['status'] == 3){ echo "selected"; } ?>>Success</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Client Company</label>
                                <input type="text" name="client_company" id="inputClientCompany" class="form-control" value="<?php echo $row['client_company']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">Project Leader</label>
                                <input type="text" name="project_leader" id="inputProjectLeader" class="form-control" value="<?php echo $row['project_leader']; ?>">
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
                                <input type="number" name="estimated_budget" id="inputEstimatedBudget" class="form-control" value="<?php echo $row['estimated_budget']; ?>" step="1">
                            </div>
                            <div class="form-group">
                                <label for="inputSpentBudget">Total amount spent</label>
                                <input type="number" name="total_amount" id="inputSpentBudget" class="form-control" value="<?php echo $row['total_amount']; ?>" step="1">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedDuration">Estimated project duration</label>
                                <input type="number" name="estimated_project_duration" id="inputEstimatedDuration" class="form-control" value="<?php echo $row['estimated_project_duration']; ?>" step="0.1">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <div class="col-12">
                    <a href="project.php" class="btn btn-secondary" name="cancel">Cancel</a>
                    <input type="hidden" name="project_id" value="<?php echo $row['id']; ?>">
                    <input class="btn btn-success float-right" type="submit" name="update_project" value="Save Changes">
                </div>
            </div>
        </form>
        
        <div class="message">
                <?php
                    if( isset($_SESSION["message"] ) ) {
                        echo "<p>". $_SESSION["message"] . "</p>";
                        unset($_SESSION["message"]);
                    }
                    ?>
            <!-- </div> -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<?php include "common/right_menu.php"; 
include "common/footer.php"; ?>