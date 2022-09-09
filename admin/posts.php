<?php 
include "./admin-header.php"; 
?>

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
                            <a href="./add-new.php" class="btn btn-primary">Add New Post</a>
                        </div>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Posts</li>
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
                                <h3 class="card-title">All Posts</h3>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered w-100 table">
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
                                                <th>Post Title</th>
                                                <th>Category</th>
                                                <th>Breaking News</th>
                                                <th>Post Date</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                            <?php
                                            $posts=$admin->get_post_titles();
                                            $counter=1;
                                            foreach ($posts as $post) { 
                                                echo "<tr>";
                                                echo "<td>".$counter."</td>";
                                                echo '<td>'.$post['post_title'].'</td>'; 
                                                echo '<td>'.$post['post_type'].'</td>'; 
                                                echo '<td>'.$post['post_isbreaking'].'</td>'; 
                                                echo "<td>".date("Y-m-d", strtotime($post['post_date']))."</td>"; ?>

                                                <td class="h3">
                                                <a href="javascript:delete_post(<?php echo $post['post_id']; ?>)" data-toggle="tooltip" data-placement="top" data-original-title="Delete" class="px-1 mx-1 btn-outline-danger"><i class="mdi mdi-delete"></i></a>
                                                <a href="./edit.php?post-id=<?php echo $post['post_id']; ?>" data-toggle="tooltip" data-placement="top" data-original-title="Edit" class="px-1 mx-1 btn-outline-success"> <i class="mdi mdi-pen"></i></a>
                                                </td>

                                               <?php echo "</tr>";
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
                    window.location.href='./posts.php?delete_post_id='+id;                              
                }
            }
        </script>


<?php
  if(isset($_GET['delete_post_id']) && $_GET['delete_post_id']!="" && $_GET['delete_post_id']!=" " && $_GET['delete_post_id']!=null)
  {
    if (is_numeric($_GET['delete_post_id'])){
        $admin->delete_post($_GET['delete_post_id']);
    }   else{
        echo "error";
    }        
  }
 

include_once "./admin-footer.php"; 
?>