<?php 
include_once './functions.php';
$data = new Frontend;
if(isset($_POST['save_comment']))
{
    $id=$_POST['post_id'];
    $returnresult=$data->save_comment($id,$_POST['post_title'],$_POST['comment_body'],$_POST['comment_author'],$_POST['comment_email']);
    if($returnresult)
    {
       header('location: post.php?id='.$id.'&success=true');
    }
    else{
        header('location: post.php?id='.$id.'&success=false');
    }
}
?>