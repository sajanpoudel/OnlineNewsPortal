<?php 
include_once './header.php';
$searchfor="";
if(isset($_GET['search']))
{
    $searchfor=$_GET['search'];
}
$searchresults=$frontend->search_posts($searchfor);
$totalvisitorcount=$frontend->visitorcount('Homepage');
?>

    <div class="breadcumb-area section_padding_100 bg-img background-overlay" style="background-image: url(img/bg-img/1.jpg);">
        <div class="container">
            <div class="single-post-title-content ">
                <h2 class="font-pt">Search Results For: <?php echo $searchfor; ?></h2>
            </div>
        </div>
    </div>

    <section class="search-post-area section_padding_100">
        <div class="container">
            <div class="row">
                <?php 
                foreach ($searchresults as $post) { ?>
                    <div class="col-12 search-post p-3">
                        <div class="theme-post-tag">
                            <a href="./catagory.php?category=<?php echo $post['post_type']; ?>"><?php echo $post['post_type']; ?></a>
                        </div>
                        <h2 class="font-pt"><a style="color:inherit;font:inherit;" href="./post.php?id=<?php echo $post['post_id']; ?>"> <?php echo $post['post_title']; ?> </a> </h2>
                        <p class="theme-post-date"><?php echo date("F j, y",strtotime($post['post_date'])); ?></p>
                    </div>
                <?php } ?>
                
              
            </div>
        </div>
    </section>


<?php 
include_once './footer.php';
?>