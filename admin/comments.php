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
                        </div>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Comments</li>
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
                                <h3 class="card-title">All Comments</h3>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered w-100 table">
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
                                                <th>Comment Title</th>
                                                <th>Comment On Post</th>
                                                <th>Comment Date</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $comments=$admin->get_comments_titles();
                                            $counter=1;
                                            foreach ($comments as $comment) { 
                                                echo "<tr>";
                                                echo "<td>".$counter."</td>";
                                                echo '<td>'.$comment['comment_body'].'</td>'; 
                                                echo '<td>'.$comment['post_title'].'</td>'; 
                                                echo "<td>".date("Y-m-d", strtotime($comment['comment_date']))."</td>"; ?>

                                                <td class="h3">
                                                <a href="javascript:delete_post(<?php echo $comment['comment_id']; ?>)" data-toggle="tooltip" data-placement="top" data-original-title="Delete" class="px-1 mx-1 btn-outline-danger"><i class="mdi mdi-delete"></i></a>
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
                    window.location.href='./comments.php?delete_comment_id='+id;                              
                }
            }
        </script>


<?php
  if(isset($_GET['delete_comment_id']) && $_GET['delete_comment_id']!="" && $_GET['delete_comment_id']!=" " && $_GET['delete_comment_id']!=null)
  {
    if (is_numeric($_GET['delete_comment_id'])){
        $admin->delete_comment($_GET['delete_comment_id']);
    }   else{
        echo "error";
    }        
  }
 

include "./admin-footer.php"; 
?>