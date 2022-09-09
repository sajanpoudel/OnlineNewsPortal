<?php 
include './functions.php';
$data = new AdminFunctions;

if(isset($_POST['getcategory']))
{
   $results=$data->get_category_titles();
   $returnstr='';
   foreach($results as $result)
    {
        $returnstr .='<option class="form-control">'. $result["category_name"] .'</option>';
    }
    print($returnstr);
}

?>