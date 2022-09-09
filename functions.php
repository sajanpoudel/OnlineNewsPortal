<?php
include './db-config.php';

class Frontend
{

     
    /********************************************************************* */
    //function to get excerpt --start--
    /********************************************************************* */
    function get_excerpt($text, $count=10)
    {
    $words = explode(' ', $text);
    $result = '';
    for ($i = 0; $i < $count && isset($words[$i]); $i++) {
        $result .= $words[$i].' ';
    }
    $result .= '....';
    return $result;
    }

    /********************************************************************* */
    //function to get excerpt --end--
    /********************************************************************* */




    /********************************************************************* */
    //function to login a user --start--
   /********************************************************************* */
   function admin_login()
   {
      if(!isset($_SESSION)){
         // session_start();
      }
      $_SESSION['isloggedin'] = 0;
       $db=new Dbconfig;
       $con=$db->connect_db();

       $myusername = $_POST['user_name'];
       $mypassword = $_POST['user_pass']; 

       // prepare and bind
       $stmt = $con->prepare("SELECT * FROM `tb_users` WHERE `user_name` = ?");
       $stmt->bind_param("s", $user);

       // set parameters and execute
       $user =  $myusername;
       $stmt->execute();
       $arr = [];
       $result= $stmt->get_result();
       while($row = $result->fetch_assoc()) {
       $arr[] = $row;
       }
       $stmt->close();
       $con->close();
       $con=null;

       if(count($arr)>0){
           if(password_verify($mypassword, $arr[0]['user_password'])){
               $_SESSION['isloggedin'] = 1;
               $_SESSION['login_user'] = $arr[0]['user_name'];
               $_SESSION['login_fullname'] = $arr[0]['user_fullname'];
               $_SESSION['user_privilage'] = $arr[0]['user_privilage'];
               $_SESSION['login_user_id'] = $arr[0]['user_id'];

               // header('location: ./admin/');
               // echo "hello";
               // print_r($_SESSION);
               // echo '<script>window.location.href="./admin/"; </script>';
               ?>
               <script type="text/javascript">
                  window.location.href='./admin/';
               </script>
               <?php 
           }
           else
           {
            echo "<script>window.location.href='./login.php?lerror=true'; </script>";
         }
           
           
       }
       else{
         //   header('location: ./login.php?lerror=true');
           echo "<script>window.location.href='./login.php?lerror=true'; </script>";
       }
   
   }
   /********************************************************************* */
   //function to login a user --end--
  /********************************************************************* */

   /********************************************************************* */
   //function to fetch all post titles of respected post type in descending order --start--
   /********************************************************************* */
   function get_header_categories()
   {   
      $db=new Dbconfig;
      $con=$db->connect_db();
  
      $stmt = $con->prepare(" SELECT *  FROM `tb_category` WHERE `category_inheader`= ? ORDER BY `category_id` DESC");
      $stmt->bind_param("s", $head);
      $head=1;
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
   //function to fetch all post titles of respected post type in descending order --start--
   /********************************************************************* */
   function get_breaking_news()
   {   
      $db=new Dbconfig;
      $con=$db->connect_db();
  
      $stmt = $con->prepare(" SELECT `post_id`,`post_title`,`post_image`  FROM `tb_posts` WHERE `post_isbreaking`= ? ORDER BY `post_id` DESC LIMIT 4");
      $stmt->bind_param("s", $types);
      $types="Yes";
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
   //function to fetch all post  of respected post type in descending order --start--
   /********************************************************************* */
   function get_posts($ptype='',$filter='DESC',$lim=-1)
   {   
      $db=new Dbconfig;
      $con=$db->connect_db();
      if($ptype=='' or $ptype=="" or $ptype==null){
         if ($lim==-1) {
            $stmt = $con->prepare(" SELECT *  FROM `tb_posts` ORDER BY `post_id` $filter");
         } else {
            $stmt = $con->prepare(" SELECT *  FROM `tb_posts` ORDER BY `post_id` $filter LIMIT $lim ");
         }
      }
      else{
         if ($lim==-1) {
            $stmt = $con->prepare(" SELECT *  FROM `tb_posts` WHERE `post_type`=? ORDER BY `post_id` $filter");
         } else {
            $stmt = $con->prepare(" SELECT *  FROM `tb_posts` WHERE `post_type`=? ORDER BY `post_id` $filter LIMIT $lim ");
         }
         $stmt->bind_param("s", $types);
         $types=$ptype;
      }
      
      
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
   //function to fetch a post comments --start--
   /********************************************************************* */
   function get_comments($id)
   {   
      $db=new Dbconfig;
      $con=$db->connect_db();
  
      $stmt = $con->prepare(" SELECT *  FROM `tb_comments` WHERE `post_id`=? ");
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
  //function to fetch a post comments--end--
  /********************************************************************* */


   /********************************************************************* */
  //function to manage visitors count  --start--
  /********************************************************************* */
   function visitorcount($page='Homepage')
   {
      $db=new Dbconfig;
      $con=$db->connect_db();

      $stmt= $con->prepare("INSERT INTO tb_visitorlog(access_page,access_counter,access_date) values(?,?,?) ");
      $stmt->bind_param("sss", $pg,$count,$dt);
      $pg=$page;
      $count='1';
      $dt=date('Y/m/d');
      $stmt->execute();
      $stmt->close();

      $counter='0';
      $stmt1=$con->prepare("SELECT COUNT(*) AS counter FROM `tb_visitorlog` ");
      $stmt1->execute();

      $result= $stmt1->get_result();
      while ($row = $result->fetch_assoc()) {
         $counter=$row['counter'];
      }
    
      $stmt1->close();
      $con->close();
      $con=null;
      return $counter;
   }
   /********************************************************************* */
  //function to manage visitors count  --end--
  /********************************************************************* */

   /********************************************************************* */
  //function to manage visitors count of a content  --start--
  /********************************************************************* */
  function content_counter($page)
  {
     $db=new Dbconfig;
     $con=$db->connect_db();
     $counter='0';
     $stmt1=$con->prepare("SELECT COUNT(*) AS counter FROM `tb_visitorlog` WHERE `access_page`=? ");
     $stmt1->bind_param("s",$pname);
     $pname=$page;
     $stmt1->execute();

     $result= $stmt1->get_result();
     while ($row = $result->fetch_assoc()) {
        $counter=$row['counter'];
     }
   
     $stmt1->close();
     $con->close();
     $con=null;
     return $counter;
  }
  /********************************************************************* */
 //function to manage visitors count of a content --end--
 /********************************************************************* */

   /********************************************************************* */
   //function to save comment to db  --start--
  /********************************************************************* */

   function save_comment($postid,$posttitle,$comment,$author,$email)
   {
      $db=new Dbconfig;
      $con=$db->connect_db();

      $stmt= $con->prepare("INSERT INTO tb_comments(post_id,post_title,comment_body,comment_author,comment_date,comment_email) values(?,?,?,?,?,?) ");
      $stmt->bind_param("ssssss", $pid,$pttl,$cbd,$cauth,$cdt,$cmail);
      
      $pid=$postid;
      $pttl=$posttitle;
      $cbd=$comment;
      $cauth=$author;
      $cdt=date('Y/m/d h:i:s');
      $cmail=$email;
         
      if ($stmt->execute()) {
         return true;
      } else {
         return false;
      }
   
      $stmt->close();
      $con->close();
      $con=null;
   }

   /********************************************************************* */
   //function to save comment to db  --end--
  /********************************************************************* */


   /********************************************************************* */
   //function to search in all results  --start--
   /********************************************************************* */
   function search_posts($content)
   {   
      $db=new Dbconfig;
      $con=$db->connect_db();
      $stmt = $con->prepare(" SELECT *  FROM `tb_posts` WHERE `post_title` LIKE '%$content%' ORDER BY `post_id` DESC ");

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
  //function to search in all results --end--
  /********************************************************************* */



}

?>