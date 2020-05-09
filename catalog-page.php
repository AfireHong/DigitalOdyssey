<?php
    include 'header.php';
    //每页显示条数
    $pagesize = 9;
    //当前页
    $page = isset($_GET['page'])?$_GET['page']:1;
    //开始行
    $startrow = ($page-1)*$pagesize;
    $sql1 = "SELECT * FROM goods";
    $result1 = $mySQLi->query($sql1);
    //总记录数和总页数
    $records = $result1->num_rows;
    $pages = ceil($records/$pagesize);
    $sql2 = "SELECT goods.goods_id, goods.goods_name, goods.max_price, img.img_url FROM goods,img WHERE goods.goods_id=img.goods_id AND goods.is_up='1' LIMIT {$startrow}, {$pagesize}";
    $reslut2 = $mySQLi->query($sql2);
    $arrs = $reslut2->fetch_all(MYSQLI_ASSOC);
?>
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">产品目录</h2>
                    <p>数码奥德赛，懂你最想要的！</p>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="d-none d-md-block">
                                <div class="filters">
                                    <div class="filter-item">
                                        <h3>分类</h3>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">手机</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">笔记本</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3">相机</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4">平板</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5">配件</label></div>
                                    </div>
                                    <div class="filter-item">
                                        <h3>品牌</h3>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">华为</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">Apple</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">OnePlus</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-9">联想</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-10"><label class="form-check-label" for="formCheck-10">戴尔</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-11"><label class="form-check-label" for="formCheck-11">惠普</label></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-md-none"><a class="btn btn-link d-md-none filter-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="filters" href="#filters" role="button">筛选<i class="icon-arrow-down filter-caret"></i></a>
                                <div class="collapse"
                                    id="filters">
                                    <div class="filters">
                                        <div class="filter-item">
                                        <h3>分类</h3>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">手机</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">笔记本</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3">相机</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4">平板</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5">配件</label></div>
                                    </div>
                                    <div class="filter-item">
                                        <h3>品牌</h3>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">华为</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">Apple</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">OnePlus</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-9">联想</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-10"><label class="form-check-label" for="formCheck-10">戴尔</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-11"><label class="form-check-label" for="formCheck-11">惠普</label></div>
                                    </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="products">
                                <div class="row no-gutters">
                                    <?php
                                        foreach ($arrs as $arr):
                                    ?>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="clean-product-item">
                                                <div class="image"><a href="product-page.php?gd_id=<?php echo $arr['goods_id']; ?>" target="_blank"><img class="img-fluid d-block mx-auto" src="assets/img/goods_img/<?php echo $arr['img_url'] ?>"></a></div>
                                                <div class="product-name"><a href="product-page.php?gd_id=<?php echo $arr['goods_id']; ?>" target="_blank"><?php echo $arr['goods_name'] ?></a></div>
                                                <div class="about">
                                                    <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                    <div class="price">
                                                        <h3><?php echo $arr['max_price'] ?></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item <?php if($page==1){echo "disabled";}?>"><a class="page-link" href="?page=1" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <li class="page-item <?php if($page==1){echo "disabled";}?>"><a class="page-link" href="?page=<?php echo $page-1; ?>" aria-label="Previous"><span aria-hidden="true">‹</span></a></li>
                                        <?php
                                            $start = $page-2;
                                            $end = $page+2;
                                            if($page<=3){
                                                $start = 1;
                                                $end = 5;
                                            } 
                                            if($page>=$pages-2){
                                                $start = $pages-4;
                                                $end = $pages;
                                            }
                                            if($pages<5){
                                                $start = 1;
                                                $end = $pages;
                                            }
                                            for($i=$start; $i<=$end; $i++){
                                        ?>
                                                <li class="page-item <?php if($i==$page){echo "active";}?>"><a class="page-link" href="?page=<?php echo $i;?>"><?php echo $i;?></a></li>
                                        <?php }?>
                                        <li class="page-item <?php if($page==$pages){echo "disabled";}?>"><a class="page-link" href="?page=<?php echo $page+1; ?>" aria-label="Previous"><span aria-hidden="true">›</span></a></li>
                                        <li class="page-item <?php if($page==$pages){echo "disabled";}?>"><a class="page-link" href="?page=<?php echo $pages;?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
        include 'footer.php';
    ?>