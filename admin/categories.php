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
                        <a href="javascript:void(0);" id="open-modal" data-toggle="modal" data-target="#Modal1" class="btn btn-primary">Add New Category</a>
                        </div>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
                                <h3 class="card-title">All Categories</h3>

                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered w-100 table">
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
                                                <th>Category Title</th>
                                                <th>Category In Header</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $categories=$admin->get_category_titles();
                                            $counter=1;
                                            foreach ($categories as $category) { 
                                                 
                                                echo "<tr>";
                                                echo '<td>'.$counter.'</td>';
                                                echo '<td>'.$category['category_name'].'</td>';
                                                $inheader='False';
                                                if($category['category_inheader']==1){ $inheader='True'; } 
                                                echo '<td>'.$inheader.'</td>'; ?>
                                                <td class="h3">
                                                <a href="javascript:delete_post(<?php echo $category['category_id']; ?>)" data-toggle="tooltip" data-placement="top" data-original-title="Delete" class="px-1 mx-1 btn-outline-danger"><i class="mdi mdi-delete"></i></a>
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
                <!-- Modal for saving category start-->
                <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true ">
                    <div class="modal-dialog" role="document ">
                        <div class="modal-content">
                            <form action="./savedata.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">
                                        Category Details
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true ">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body " aria-live="polite">
                                    <div class="form-group col-12">
                                        <label class="h6">Category Name </label>
                                        <input type="text" name="cat-name" class="form-control font-weight-normal shadow p-2" id="" placeholder="Enter Member's Name Here" required>
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="h6" for="cat-header">Include In Header <input type="checkbox" name="cat-inheader" id="cat-header"> </label>
                                    </div>
                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="save-category" value="save" class="btn btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Save Category"><i class="mdi mdi-telegram"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal for saving category end-->


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
                    window.location.href='./categories.php?delete_category_id='+id;                              
                }
            }

           
        </script>


<?php
  if(isset($_GET['delete_category_id']) && $_GET['delete_category_id']!="" && $_GET['delete_category_id']!=" " && $_GET['delete_category_id']!=null)
  {
    if (is_numeric($_GET['delete_category_id'])){
        $admin->delete_category($_GET['delete_category_id']);
    }   else{
        echo "error";
    }        
  }
 

include_once "./admin-footer.php"; 
?>