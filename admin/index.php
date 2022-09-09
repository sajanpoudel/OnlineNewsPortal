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
                            &nbsp;
                        </div>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Home</li>
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
                                <h3 class="card-title">Visitor Count</h3>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered w-100 table">
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
                                                <th>Page Name</th>
                                                <th>View Count </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                            <?php
                                            $visitors=$admin->vcounter();
                                            $counter=1;
                                            $total=0;
                                            foreach ($visitors as $visitor) { 
                                                echo "<tr>";
                                                echo "<td>".$counter."</td>";
                                                echo '<td>'.$visitor['access_page'].'</td>'; 
                                                echo '<td>'.$visitor['counter'].'</td>'; 
                                                $total+=$visitor['counter'];
                                                echo "</tr>";
                                                $counter++;
                                            }
                                            $counter=1;
                                            ?>
                                            
                                        </tbody>
                                       
                                    </table>
                                </div>
                                <hr>
                                <h3 class="card-title text-center">Total Visitors Count : <?php echo $total; ?> </h3>

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

 
<?php 
include_once "./admin-footer.php"; 
?>