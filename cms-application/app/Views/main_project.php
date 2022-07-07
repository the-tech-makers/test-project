<?php include "common/header.php"; ?>
 
 <!-- Main Sidebar Container -->
 <?php include "common/left_menu.php"; ?>

 <link rel="stylesheet" href="css/project.css">
 <?php

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

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Projects</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Projects</li>
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
  
   <!-- <?php// echo 'data inserted successfully'; ?> -->
     <!-- Default box -->
     <div class="card">
       <div class="card-header">
         <h3 class="card-title">Projects</h3>

         <div class="card-tools">
           <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
             <i class="fas fa-minus"></i>
           </button>
           <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
             <i class="fas fa-times"></i>
           </button>

          </div>
       </div>

       <?php



        
        // $limit = 4;  
        //  if(isset($_GET['page'])) {
        //   $page = $_GET['page'];
        //  }else{
        //   $page = 1;
        // }
        //  $offset = ($page - 1) * $limit;  
        //  $query = "SELECT * FROM tbl_projects ORDER BY id DESC LIMIT {$offset},{$limit}";

        //  $res = $mysqli->query($query);
        ?> 
       <div class="card-body p-0">
         <table class="table table-striped projects">
             <thead>
                 <tr>
                     <th style="width: 1%">
                         #
                     </th>
                     <th>
                         Project Name
                     </th>
                     <th>
                         Client Company
                     </th>
                     <th>
                         Project Leader
                     </th>
                     <th>
                         Estimated Budget
                     </th>
                     <th>
                         Total Amount
                     </th>
                     <th>
                         Project Duration
                     </th>
                     <th style="width: 8%" class="text-center">
                         Status
                     </th>
                     <th style="width: 20%">
                     </th>
                 </tr>
             </thead>
             <tbody>
              <?php               
              foreach ($result as $key => $value) {


              ?>
                 <tr>
                     <td>
                         <?php echo $value->id; ?>
                     </td>
                     <td>
                         <a>
                           <?php echo $value->project_name; ?>
                         </a>
                         <br/>
                         <span class="desc"> Created -<?php echo time_elapsed_string($value->added_on); ?></span>
                     </td>
                     <td><?php echo $value->client_company; ?></td>
                     <td><?php echo $value->project_leader; ?></td>
                     <td><?php echo $value->estimated_budget; ?></td>
                     <td><?php echo $value->total_amount; ?></td>
                     <td><?php echo $value->estimated_project_duration; ?></td>
                     <td class="project-state">
                       <?php 
                           $status = $value->status;
                           if($status == 1){ ?>
                             <span class="badge badge-on-hold bg-primary">On Hold</span>
                           <?php }else if($status == 2){ ?>
                         <span class="badge badge-cancelled bg-danger">Cancelled</span>
                           <?php }else if($status == 3){ ?>
                               <span class="badge badge-success bg-green">Success</span>
                           <?php }else{ ?>
                               <span class="badge badge-invalid bg-warning">Invalid</span>
                           <?php } ?>
                     </td>
             <td class="project-actions text-right">
               <form method="post" action="<?php echo base_url();?>/main_project">
                         <a class="btn btn-primary btn-sm" href="project_detail?project_id=<?php echo $value->id; ?>" name="project_id">
                             <i class="fas fa-folder">
                             </i>
                             View
                         </a>
                
                         <a class="btn btn-info btn-sm" href="project_edit?project_id=<?php echo $value->id; ?>" name="project_id">
                             <i class="fas fa-pencil-alt">
                             </i>
                             Edit
                         </a>
                    <input type="hidden" name="project_id" value="<?php echo $value->id; ?>">
                    <button onclick="return confirm('Are you sure you want to delete this item');" class="btn btn-danger btn-sm" type="submit" name="delete_btn">
                         <i class="fas fa-trash"></i>
                         Delete
                    </button>
                    <p id="demo"></p>
               </form>
             </td>
               </tr>
             <?php
               }
            ?>
             </tbody>
         </table>
       <!-- <?php

          // $sql = "SELECT * FROM tbl_projects";
          // $res1 = $mysqli->query($sql)  or die ("Query Failed.");

          // if(mysqli_num_rows($res1) > 0){

          //  $total_records = mysqli_num_rows($res1);
          //  $total_page = ceil($total_records / $limit); 

          //  echo '<ul class = "pagination admin-pagination">';

          //  if($page > 1){
          //    echo '<li class="pre_btn"><a href="main_project?page='.($page - 1).'">Prev</a></li>';
          //  }
           
          //  for($i = 1; $i <= $total_page; $i++){
          //    if($i == $page){
          //      $active = "active mr-3 bg-blue";
          //    }else{
          //      $active = "mr-3";
          //    }
          //    echo '<li class="'.$active.'"><a href="main_project?page='.$i.'">'.$i.'</a></li>';
          //  }
          //  if($total_page > $page){
          //    echo '<li class="pre_btn"><a href="main_project?page='.($page + 1).'">Next</a></li>';
          //  }

           //echo '</ul>';
        // }
       ?> -->
       </div>
     </div>
   </section> 
 <!-- Control Sidebar -->
<?php include "common/right_menu.php"; ?> 
 <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include "common/footer.php"; ?>
