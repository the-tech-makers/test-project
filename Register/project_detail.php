<?php include "common/header.php";

if($_GET['project_id'] != ''){
  $project_id = $_GET['project_id'];
  
  $get_project = "SELECT * FROM tbl_projects WHERE id=$project_id";

  $res = $mysqli->query($get_project);

  $row = $res->fetch_assoc();

}else{
  header("Location: project.php");
  die;
}


function time_elapsed_string($datetime, $full = false) {
  $now = new DateTime;
  
  $ago = new DateTime($datetime);
  
  $diff = $now->diff($ago);
  
  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
  );
  foreach ($string as $k => &$v) {
      if ($diff->$k) {
          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
          unset($string[$k]);
      }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}

?>

  <!-- Main Sidebar Container -->
<?php include "common/left_menu.php"; ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
     </section>

      <!-- Main content -->
  <section class="content">
    <form method="post" action="main_function.php">
      <input type="hidden" name="id" value="<?php echo $_GET['project_id']; ?>" >
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects Detail</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated budget</span>
                      <span name="estimated_budget" class="info-box-number text-center text-muted mb-0"><?php echo $row['estimated_budget']; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total amount spent</span>
                      <span name="total_amount" class="info-box-number text-center text-muted mb-0"><?php echo $row['total_amount']; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated project duration</span>
                      <span name="estimated_project_duration" class="info-box-number text-center text-muted mb-0"><?php echo $row['estimated_project_duration']; ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Recent Activity</h4>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="assets/dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a name="project_name" href="#"><?php echo $row['project_name']; ?></a>
                        </span>
                        <span class="description">Shared publicly - <?php echo time_elapsed_string($row['added_on']); ?></span>
                      </div>
                      <!-- /.user-block -->
                      <p name="project_desc" >
                      <?php echo $row['project_desc']; ?>
                      </p>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              
              <!-- <br> -->
              <div class="text-muted">
                <p class="text-sm">Client Company
                  <b name="client_company" class="d-block"><?php echo $row['client_company']; ?></b>
                </p>
                <p class="text-sm">Project Leader
                  <b name="project_leader" class="d-block"><?php echo $row['project_leader']; ?></b>
                </p>
              </div>
              <div class="text-center mt-5 mb-3">
              <input type="hidden" name="project_id" value="<?php echo $row['id']; ?>">
              </div>
            </div>
          </div>
        </div>
    </form>
        <!-- /.card-body -->
      </div>
      <div class="message">
                <?php
                    if( isset($_SESSION["message"] ) ) {
                        echo "<p>". $_SESSION["message"] . "</p>";
                        unset($_SESSION["message"]);
                    }
                ?>
      </div>

  </section>
</div>
  <?php include "common/right_menu.php"; ?>
<?php include "common/footer.php"; ?>

