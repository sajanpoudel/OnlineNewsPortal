<?php 
require './functions.php'; 
$objadmin=new AdminFunctions;

if(isset($_POST['save-post']))
{
    $isbreaking='No';
    if (isset($_POST['isbreaking'])) {
        $isbreaking='Yes';
    }
    $image_tmp = $_FILES['thumbnail']['tmp_name'];
    $imgget=$_FILES['thumbnail']['name'];
    $image=date('Ymd').'-'.$imgget;
    if ($imgget==null) {
        $image="default.jpg";
    }

    move_uploaded_file($image_tmp,"../uploads/$image");
    $objadmin->save_post($_POST['post-type'],$_POST['post-title'],$_POST['post-body'],$isbreaking,$_POST['post-author'],$image);
}

elseif(isset($_POST['update-post']))
{
    $isbreaking='No';
    $post_type=$_POST['post-type'];
    if (isset($_POST['isbreaking'])) {
        $isbreaking='Yes';
    }
    $image_tmp = $_FILES['thumbnail']['tmp_name'];
    $imgget=$_FILES['thumbnail']['name'];
    $image=date('Ymd').'-'.$imgget;
    if ($imgget==null) {
        $image=$_POST['old-thumbnail'];
    }
    if($post_type=="" or $post_type==null){
        $post_type=$_POST['post-type-old'];
    }
    move_uploaded_file($image_tmp,"../uploads/$image");
    $objadmin->update_post($_POST['post-id'],$post_type,$_POST['post-title'],$_POST['post-body'],$isbreaking,$_POST['post-author'],$image);
}

elseif (isset($_POST['save-category'])) {
    $inheader=0;
    if (isset($_POST['cat-inheader'])) {
        $inheader=1;
    }
    $objadmin->save_category($_POST['cat-name'],$inheader);
}

elseif (isset($_POST['save-user'])) {
    if($_POST['user-password']!=$_POST['user-password-confirm'])
    {
        header('location: ./add-user.php?error=password-error');
    }
    $objadmin->save_user($_POST['user-name'],$_POST['user-password'],$_POST['user-fullname'],$_POST['user-email']);
}

elseif (isset($_POST['update-user'])) {
    $pwd='';
    if ($_POST['user-password']==$_POST['old_password']) {
        $pwd=$_POST['user-password'];
    } else {
        $pwd= password_hash($_POST['user-password'],PASSWORD_DEFAULT);
    }
    $objadmin->update_user($_POST['user-id'],$pwd,$_POST['user-fullname'],$_POST['user-email']);
}


else
{
    // print_r($_POST);
    // echo "<hr>";
    // print_r($_FILES);
    header('location: ./index.php');
  
}

?>