<?php 
include "./admin-header.php"; 

if($privilage!=1){ ?>
<script>
    window.location.href="./index.php";
</script>
<?php } ?>

  <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div>
                            <a href="./add-user.php" class="btn btn-primary">Add New User</a>
                        </div>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">All Users</h3>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered w-100 table">
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
                                                <th>Username</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                            <?php
                                                
                                                $users=$admin->get_all_users();
                                                $counter=1;
                                               
                                                foreach ($users as $user) {
                                                    echo "<tr>";
                                                    echo "<td>".$counter."</td>";
                                                    echo "<td>".$user['user_name']."</td>";
                                                    echo '<td>'.$user['user_fullname'].'</td>';
                                                    echo "<td>".$user['user_email']."</td>";
                                                    ?>
                                                    <td class="h3">
                                                    <?php if($user['user_privilage'] == 0){ ?>
                                                    <a href="javascript:delete_post(<?php echo $user['user_id']; ?>)" data-toggle="tooltip" data-placement="top" data-original-title="Delete" class="px-1 mx-1 btn-outline-danger"><i class="mdi mdi-delete"></i></a>
                                                    <?php } ?>
                                                    <a href="./edit-profile.php?user-id=<?php echo $user['user_id']; ?>" data-toggle="tooltip" data-placement="top" data-original-title="Edit" class="px-1 mx-1 btn-outline-success"> <i class="mdi mdi-pen"></i></a>
                                                    </td>
                                                   
                                                    <?php
                                                    echo "</tr>";
                                                    $counter++;
                                                }
                                                $counter=1;
                                            ?>
                                            
                                        </tbody>
                                        
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

        <!--************************************************************************************************************************************************-->
        <!--************************************************************************************************************************************************-->

        <script type="text/javascript">
            function delete_post(id)
            {
                if(confirm('Sure To Remove This Record ?'))
                {
                    window.location.href='./users.php?delete_user_id='+id;                              
                }
            }
        </script>


<?php
  if(isset($_GET['delete_user_id']) && $_GET['delete_user_id']!="" && $_GET['delete_user_id']!=" " && $_GET['delete_user_id']!=null)
  {
    if (is_numeric($_GET['delete_user_id'])){
        $admin->delete_user($_GET['delete_user_id']);
    }   else{
        echo "error";
    }        
  }
 

include "./admin-footer.php"; 
?>