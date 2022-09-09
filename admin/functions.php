<?php
require "../db-config.php";

class AdminFunctions
{
   
   /********************************************************************* */
   //function to function to check if user is logged in --start--
   /********************************************************************* */
   function isAdmin()
   {
      // print_r($_SESSION);
   //  $db=new Dbconfig;
   //  $cons=$db->connect_db();

   //  $user_check = $_SESSION['login_user'];
   //  $ses_sql = mysqli_query($cons,"select * FROM tb_users WHERE user_name = '$user_check' ");
   //  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   //  $login_user = $row['user_name'];
   // //  $login_user_privilage = $_SESSION['user_privilage'];
   //  $login_user_privilage = 1;
   //  $user_full=$row['user_fullname'];
   //  $userid=$row['user_id'];
   //  $cons->close();
   //  $cons=null;
   //  if(!$login_user || $login_user=="" || !isset($_SESSION['login_user'])){
   //      $_SESSION['isloggedin'] = 0;
   //      header("location: ../login.php");
   //      die();
   //  }
   //  else{
   //      $_SESSION['isloggedin'] = 1;
   //      $_SESSION['login_user'] = $login_user;
   //      $_SESSION['login_fullname'] = $user_full;
   //      $_SESSION['user_privilage'] = $login_user_privilage;
   //      $_SESSION['login_user_id'] = $userid;
   //  }
  }

  /********************************************************************* */
  //function to function to check if user is logged in --end--
  /********************************************************************* */

  /********************************************************************* */
  //function to function to logout the user --start--
  /********************************************************************* */

  function logout()
  {
     // Initialize the session
     if(!isset($_SESSION)){
      session_start();
   }
     
     // Unset all of the session variables
     $_SESSION = array();
     
     // Destroy the session.
     session_destroy();
      if(!isset($_SESSION)){
         session_start();
      }
     $_SESSION['isloggedin']=false;
     // Redirect to login page
     header("location: /login.php");
     exit;
  }
  
  /********************************************************************* */
  //function to function to logout the user --end--
  /********************************************************************* */


   /********************************************************************* */
   //function to fetch all post titles of respected post type in descending order --start--
   /********************************************************************* */
   function get_post_titles()
   {   
      $db=new Dbconfig;
      $con=$db->connect_db();
  
      $stmt = $con->prepare(" SELECT `post_id`,`post_title`,`post_date`,`post_type`,`post_isbreaking`  FROM `tb_posts` ORDER BY `post_id` DESC");
    
      //  execute
      $stmt->execute();
  
      $arr = [];
      $result= $stmt->get_result();
      while($row = $result->fetch_assoc()) {
        $arr[] = $row;
      }
      $stmt->close();
      $con->close();
      $con=null;
  
      return $arr;
   }   

  /********************************************************************* */
  //function to fetch all post titles of respected post type in descending order --end--
  /********************************************************************* */

  /********************************************************************* */
   //function to fetch all categories titles of respected post type in descending order --start--
   /********************************************************************* */
   function get_category_titles()
   {   
      $db=new Dbconfig;
      $con=$db->connect_db();
  
      $stmt = $con->prepare(" SELECT `category_id`,`category_name`,`category_inheader`  FROM `tb_category` ORDER BY `category_id` DESC");
    
      //  execute
      $stmt->execute();
  
      $arr = [];
      $result= $stmt->get_result();
      while($row = $result->fetch_assoc()) {
        $arr[] = $row;
      }
      $stmt->close();
      $con->close();
      $con=null;
  
      return $arr;
   }   

  /********************************************************************* */
  //function to fetch all categories titles of respected post type in descending order --end--
  /********************************************************************* */


   /********************************************************************* */
   //function to fetch all post  of respected post type in descending order --start--
   /********************************************************************* */
   function get_posts($ptype,$filter='DESC')
   {   
      $db=new Dbconfig;
      $con=$db->connect_db();
  
      $stmt = $con->prepare(" SELECT *  FROM `tb_posts` WHERE `post_type`=? ORDER BY `post_id` $filter");
      $stmt->bind_param("s", $types);
      $types=$ptype;
      //  execute
      $stmt->execute();
  
      $arr = [];
      $result= $stmt->get_result();
      while($row = $result->fetch_assoc()) {
        $arr[] = $row;
      }
      $stmt->close();
      $con->close();
      $con=null;
  
      return $arr;
   }   

  /********************************************************************* */
  //function to fetch all post of respected post type in descending order --end--
  /********************************************************************* */


   /********************************************************************* */
   //function to fetch a post --start--
   /********************************************************************* */
   function get_post($id)
   {   
      $db=new Dbconfig;
      $con=$db->connect_db();
  
      $stmt = $con->prepare(" SELECT *  FROM `tb_posts` WHERE `post_id`=? ");
      $stmt->bind_param("s", $pid);
      $pid=$id;
      //  execute
      $stmt->execute();
  
      $arr = [];
      $result= $stmt->get_result();
      while($row = $result->fetch_assoc()) {
        $arr[] = $row;
      }
      $stmt->close();
      $con->close();
      $con=null;
  
      return $arr;
   }   

  /********************************************************************* */
  //function to fetch a post --end--
  /********************************************************************* */

  /********************************************************************* */
   //function to fetch all comments titles of respected post type in descending order --start--
   /********************************************************************* */
   function get_comments_titles()
   {   
      $db=new Dbconfig;
      $con=$db->connect_db();
  
      $stmt=$con->prepare("SELECT * FROM `tb_comments` ORDER BY `comment_id` DESC ");
      //  execute
      $stmt->execute();
  
      $arr = [];
      $result= $stmt->get_result();
      while($row = $result->fetch_assoc()) {
        $arr[] = $row;
      }
      $stmt->close();
      $con->close();
      $con=null;
  
      return $arr;
   }   

  /********************************************************************* */
  //function to fetch all comments titles of respected post type in descending order --end--
  /********************************************************************* */


   /********************************************************************* */
   //function to save post to database --start--
   /********************************************************************* */
   function save_post($ptype,$ptitle,$pcontent,$breaking,$pauthor,$thumbs)
   { 
      $db=new Dbconfig;
      $con=$db->connect_db();
          
      $stmt= $con->prepare("INSERT INTO tb_posts(post_type,post_title,post_content,post_isbreaking,post_image,post_author,post_date) values(?,?,?,?,?,?,?) ");
      $stmt->bind_param("sssssss", $types,$topic,$body,$isbreaknews,$thumb,$writer,$pubdate);
      // set parameters and execute
      $types=$ptype;
      $topic = $ptitle;
      $body = $pcontent;
      $isbreaknews=$breaking;
      $writer = $pauthor;
      $thumb = $thumbs;
      $pubdate = date('Y/m/d h:i:s');

     
      $rurl= "posts.php";
     

      if($stmt->execute())
      {
         header("location: $rurl");
      }
      else{
         die('post discarded');
      }
      
      $stmt->close();
      $con->close();
      $con=null;
   }
   /********************************************************************* */
   //function to save post to database --end--
   /********************************************************************* */


   /********************************************************************* */
   //function to save post to database --start--
   /********************************************************************* */
   function save_category($cname,$cheader)
   { 
      $db=new Dbconfig;
      $con=$db->connect_db();
          
      $stmt= $con->prepare("INSERT INTO tb_category(category_name,category_inheader) values(?,?) ");
      $stmt->bind_param("ss", $catname,$catinheader);
      // set parameters and execute
      $catname=$cname;
      $catinheader = $cheader;
     
      $rurl= "categories.php";
     

      if($stmt->execute())
      {
         header("location: $rurl");
      }
      else{
         die('post discarded');
      }
      
      $stmt->close();
      $con->close();
      $con=null;
   }
   /********************************************************************* */
   //function to save post to database --end--
   /********************************************************************* */


  /********************************************************************* */
  //function to update a post to database --start--
  /********************************************************************* */
  function update_post($id,$ptype,$ptitle,$pcontent,$breaking,$pauthor,$image)
  { 
     $db=new Dbconfig;
     $con=$db->connect_db();
         
     $stmt= $con->prepare("UPDATE `tb_posts` SET post_title = ? , post_type= ? , post_content = ? , post_isbreaking=?, post_author = ? , post_image = ?  WHERE post_id = ? ");
     $stmt->bind_param("sssssss", $topic,$type,$body,$isbreaknews,$writer,$thumbs,$ids);
     // set parameters and execute
     $topic = $ptitle;
     $type=$ptype;
     $body = $pcontent;
     $isbreaknews=$breaking;
     $writer = $pauthor;
     $thumbs=$image;
     $ids = $id;

      
      $rurl= "posts.php";
      

      if($stmt->execute())
      {
         header("location: $rurl");
      }
     else{
        die('post discarded');
     }
     
     $stmt->close();
     $con->close();
     $con=null;
  }
  /********************************************************************* */
  //function to update post to database --end--
  /********************************************************************* */


  /********************************************************************* */
  //function to delete a post --start--
  /********************************************************************* */
  function delete_post($id)
  {   
     $db=new Dbconfig;
     $con=$db->connect_db();
  
     $stmt = $con->prepare(" DELETE  FROM tb_posts WHERE post_id = ? ");
     $stmt->bind_param("s", $pid);
     $pid=$id;

      
      $rurl= "posts.php";
     

     if($stmt->execute())
     {?>
        <script type="text/javascript">
              window.location.href='<?php echo $rurl; ?>';
        </script>
     <?php }else{ ?>

     <script type="text/javascript">
        window.location.href='./<?php echo $rurl; ?>?error=true';
     </script>

     <?php }
     $stmt->close();
     $con->close();
     $con=null;
  }   

 /********************************************************************* */
 //function to delete a post --end--
 /********************************************************************* */

  /********************************************************************* */
  //function to delete a category --start--
  /********************************************************************* */
  function delete_category($id)
  {   
     $db=new Dbconfig;
     $con=$db->connect_db();
  
     $stmt = $con->prepare(" DELETE  FROM tb_category WHERE category_id = ? ");
     $stmt->bind_param("s", $pid);
     $pid=$id;

      
      $rurl= "categories.php";
     

     if($stmt->execute())
     {?>
        <script type="text/javascript">
              window.location.href='<?php echo $rurl; ?>';
        </script>
     <?php }else{ ?>

     <script type="text/javascript">
        window.location.href='./<?php echo $rurl; ?>?error=true';
     </script>

     <?php }
     $stmt->close();
     $con->close();
     $con=null;
  }   

 /********************************************************************* */
 //function to delete a category --end--
 /********************************************************************* */


  /********************************************************************* */
  //function to delete a comment --start--
  /********************************************************************* */
  function delete_comment($id)
  {   
     $db=new Dbconfig;
     $con=$db->connect_db();
  
     $stmt = $con->prepare(" DELETE  FROM tb_comments WHERE comment_id = ? ");
     $stmt->bind_param("s", $pid);
     $pid=$id;

      
      $rurl= "comments.php";
     

     if($stmt->execute())
     {?>
        <script type="text/javascript">
              window.location.href='<?php echo $rurl; ?>';
        </script>
     <?php }else{ ?>

     <script type="text/javascript">
        window.location.href='./<?php echo $rurl; ?>?error=true';
     </script>

     <?php }
     $stmt->close();
     $con->close();
     $con=null;
  }   

 /********************************************************************* */
 //function to delete a comment --end--
 /********************************************************************* */

   /********************************************************************* */
   //function to fetch all users  --start--
   /********************************************************************* */

   function get_all_users()
   {   
      $db=new Dbconfig;
      $con=$db->connect_db();
   
      $stmt = $con->prepare(" SELECT *  FROM `tb_users` ");
      
      //  execute
      $stmt->execute();
   
      $arr = [];
      $result= $stmt->get_result();
      while($row = $result->fetch_assoc()) {
         $arr[] = $row;
      }
      $stmt->close();
      $con->close();
      $con=null;
   
      return $arr;
   }   

  /********************************************************************* */
  //function to fetch  all users  --end--
  /********************************************************************* */

   /********************************************************************* */
   //function to fetch a users  --start--
   /********************************************************************* */

   function get_user($id)
   {   
      $db=new Dbconfig;
      $con=$db->connect_db();
   
      $stmt = $con->prepare(" SELECT *  FROM `tb_users` WHERE `user_id` =? ");
      $stmt->bind_param("s",$uid);
      //  execute
      $uid=$id;
      $stmt->execute();
   
      $arr = [];
      $result= $stmt->get_result();
      while($row = $result->fetch_assoc()) {
         $arr[] = $row;
      }
      $stmt->close();
      $con->close();
      $con=null;
   
      return $arr;
   }   

  /********************************************************************* */
  //function to fetch  a users  --end--
  /********************************************************************* */


   /********************************************************************* */
   //function to save  a user in database --start--
   /********************************************************************* */
   function save_user($user_name,$user_pass,$user_fullname,$user_email)
   { 
      $db=new Dbconfig;
      $con=$db->connect_db();
          
      $stmt= $con->prepare("INSERT INTO `tb_users`(`user_name`,`user_password`,`user_fullname`,`user_email`,`user_privilage`) values(?,?,?,?,?) ");
      $stmt->bind_param("sssss",$uname,$upass,$ufullname,$uemail,$upri);
      // set parameters and execute
      $uname = $user_name;
      $upass = password_hash($user_pass, PASSWORD_DEFAULT);
      $ufullname = $user_fullname;
      $uemail = $user_email;
      $upri = '0';

      if($stmt->execute())
      {
      header('location: ./users.php');
      }
      else{
         die('post discarded');
      }
      $stmt->close();
      $con->close();
      $con=null;
   }
   /********************************************************************* */
   //function to save a uaer in database --end--
   /********************************************************************* */

   /********************************************************************* */
   //function to update a user in database --start--
   /********************************************************************* */
   function update_user($user_id,$user_pass,$user_fullname,$user_email)
   { 
      $db=new Dbconfig;
      $con=$db->connect_db();
          
      $stmt= $con->prepare("UPDATE `tb_users` SET `user_password`=?,`user_fullname`=?,`user_email`=? WHERE `user_id`=? ");
      $stmt->bind_param("ssss",$upass,$ufullname,$uemail,$uid);
      // set parameters and execute
      $upass = $user_pass;
      $ufullname = $user_fullname;
      $uemail = $user_email;
      $uid = $user_id;

      if($stmt->execute())
      {
      header('location: ./edit-profile.php?user-id='.$user_id);
      }
      else{
         die('post discarded');
      }
      $stmt->close();
      $con->close();
      $con=null;
   }
   /********************************************************************* */
   //function to update a uaer in database --end--
   /********************************************************************* */

   /********************************************************************* */
   //function to delete a  user --start--
   /********************************************************************* */
   function delete_user($id)
   {  
      $db=new Dbconfig;
      $con=$db->connect_db();
   
      $stmt = $con->prepare(" DELETE  FROM `tb_users` WHERE `user_id` = ? ");
      $stmt->bind_param("s", $uid);
      $uid=$id;
      if($stmt->execute())
      {?>
         <script type="text/javascript">
            window.location.href="./users.php";
         </script>
      <?php }else{ ?>

         <script type="text/javascript">
         window.location.href="./users.php?error=true";
         </script>
      <?php }
      $stmt->close();
      $con->close();
      $con=null;
   }   

  /********************************************************************* */
  //function to delete a user --end--
  /********************************************************************* */


   /********************************************************************* */
   //function to count visitors in web --start--
   /********************************************************************* */

   function vcounter()
   {
      $db=new Dbconfig;
      $con=$db->connect_db();
      $stmt1=$con->prepare("SELECT `access_page`,COUNT(*) AS counter FROM `tb_visitorlog` GROUP BY `access_page` ");
      $stmt1->execute();
      $result= $stmt1->get_result();
      $arr=[];
      while ($row = $result->fetch_assoc()) {
         $arr[]=$row;
      }
      $stmt1->close();
      $con->close();
      $con=null;
      return $arr;
   }
   /********************************************************************* */
   //function to count visitors in web --end--
   /********************************************************************* */


}

?>