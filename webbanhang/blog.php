<?php
    $is_homepage = false;
    require_once('./components/header.php');
    require_once('./db/conn.php');
?>

    

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="images/blog/background.jpeg" style="height : 300px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Blog</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Danh mục tin tức</h4>
                            <ul>
                                <li><a href="#">All</a></li>
                                <?php
                                    $sql_str2 = "select * from newscategories order by id";
                                    $result2 = mysqli_query($conn, $sql_str2);
                                    while($row2 = mysqli_fetch_assoc($result2)) {
                                ?>
                                <li><a href="#"><?=$row2['name']?> (20)</a></li>
                                <?php } ?>
                                <!-- <li><a href="#">Food (5)</a></li>
                                <li><a href="#">Life Style (9)</a></li>
                                <li><a href="#">Travel (10)</a></li> -->
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Tin mới</h4>
                                
                            <div class="blog__sidebar__recent">
                                <?php
                                    $sql_str3 = "select * from news order by created_at desc limit 0, 3 ";
                                    $result3 = mysqli_query($conn, $sql_str3);
                                    while($row3 = mysqli_fetch_assoc($result3)) {
                                ?>
                                <a href="tintuc.php?id=<?=$row3['id']?>" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="admin/<?=$row3['avatar']?>" width="70px" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6><?=$row3['title']?></h6>
                                        <span><?=$row3['created_at']?></span>
                                    </div>
                                </a>
                                <?php } ?>
                                
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4> Tìm kiếm</h4>
                            <div class="blog__sidebar__item__tags">
                                <?php
                                 $sql_str2 = "select * from newscategories order by id";
                                 $result2 = mysqli_query($conn, $sql_str2);
                                while($row2 = mysqli_fetch_assoc($result2)) { ?>
                                <a href="#"><?=$row2['name']?></a>
                                <?php } ?>
                                <!-- <a href="#">Beauty</a>
                                <a href="#">Vegetables</a>
                                <a href="#">Fruit</a>
                                <a href="#">Healthy Food</a>
                                <a href="#">Lifestyle</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        <?php
                            $sql_str3 = "select * from news order by created_at desc limit 0, 3 ";
                            $result3 = mysqli_query($conn, $sql_str3);
                            while($row3 = mysqli_fetch_assoc($result3)) {        
                        ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="admin/<?=$row3['avatar']?>" style="height:214px" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> <?=$row3['created_at']?></li>
                                        <!-- <li><i class="fa fa-comment-o"></i> 5</li> -->
                                    </ul>
                                    <h5><a href="tintuc.php?id=<?=$row3['id']?>"><?=$row3['title']?></a></h5>
                                    <p><?=$row3['summary']?></p>
                                    <a href="tintuc.php?id=<?=$row3['id']?>" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

<?php
    require_once('./components/footer.php');
?>
