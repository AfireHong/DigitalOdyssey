<?php
include 'header.php';
//每页显示条数
$pagesize = 9;
//当前页
$page = isset($_GET['page']) ? $_GET['page'] : 1;
//开始行
$startrow = ($page - 1) * $pagesize;
$sql1 = "SELECT * FROM goods where is_up='1'";
$stmt_num = $mySQLi->init();
if ($_GET['cate_id']) {
    $sql1 = "SELECT * FROM goods where is_up='1' AND cate_id = ?";
    $stmt_num = $mySQLi->prepare($sql1);
    $stmt_num->bind_param('i', $_GET['cate_id']);
    $stmt_num->execute();
} else {
    $sql1 = "SELECT * FROM goods where is_up='1'";
    $stmt_num = $mySQLi->prepare($sql1);
    $stmt_num->execute();
}
$result1 = $stmt_num->get_result();

//$result1 = $mySQLi->query($sql1);
//总记录数和总页数
$records = $result1->num_rows;
$pages = ceil($records / $pagesize);

//获取分类
$stmt_goods = $mySQLi->init();
if ($_GET['cate_id']) {
    $sql2 = "SELECT goods.goods_id, goods.goods_name, goods.max_price, img.img_url 
                    FROM goods,img 
                    WHERE goods.goods_id=img.goods_id 
                    AND goods.is_up='1' AND cate_id=?
                    LIMIT ?, ?";
    $stmt_goods = $mySQLi->prepare($sql2);
    $stmt_goods->bind_param('iii', $_GET['cate_id'], $startrow, $pagesize);
    $stmt_goods->execute();
} else {
    $sql2 = "SELECT goods.goods_id, goods.goods_name, goods.max_price, img.img_url 
                        FROM goods,img 
                        WHERE goods.goods_id=img.goods_id 
                        AND goods.is_up='1'
                        LIMIT ?, ?";
    $stmt_goods = $mySQLi->prepare($sql2);
    $stmt_goods->bind_param('ii', $startrow, $pagesize);
    $stmt_goods->execute();
}
$reslut2 = $stmt_goods->get_result();;
$arrs = $reslut2->fetch_all(MYSQLI_ASSOC);
//获取分类信息
$sql3 = "SELECT * FROM cate";
$reslut3 = $mySQLi->query($sql3);
$cateList = $reslut3->fetch_all(MYSQLI_ASSOC);
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
                                    <?php
                                    foreach ($cateList as $cate) :
                                    ?>
                                        <div class="form-check"><input class="form-check-input" type="radio" value="<?php echo $cate['cate_id'] ?>" name="cate-radio" <?php if ($cate['cate_id'] == $_GET['cate_id']) echo 'checked'; ?>><label class="form-check-label" for="formCheck-1"><?php echo $cate['cate_name']; ?></label></div>
                                    <?php endforeach; ?>
                                </div>
                                <button type="button" class="btn btn-primary" id="cate">筛选</button>
                                <!-- <div class="filter-item">
                                        <h3>品牌</h3>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">华为</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">Apple</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">OnePlus</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-9">联想</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-10"><label class="form-check-label" for="formCheck-10">戴尔</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-11"><label class="form-check-label" for="formCheck-11">惠普</label></div>
                                    </div> -->
                            </div>
                        </div>
                        <div class="d-md-none"><a class="btn btn-link d-md-none filter-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="filters" href="#filters" role="button">筛选<i class="icon-arrow-down filter-caret"></i></a>
                            <div class="collapse" id="filters">
                                <div class="filters">
                                    <div class="filter-item">
                                        <h3>分类</h3>
                                        <?php
                                        foreach ($cateList as $cate) :
                                        ?>
                                            <div class="form-check"><input class="form-check-input" type="radio" value="<?php echo $cate['cate_id'] ?>" name="cate-radio" <?php if ($cate['cate_id'] == $_GET['cate_id']) echo 'checked'; ?>><label class="form-check-label" for="formCheck-1"><?php echo $cate['cate_name']; ?></label></div>
                                        <?php endforeach; ?>
                                    </div>
                                    <!-- <div class="filter-item">
                                        <h3>品牌</h3>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">华为</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">Apple</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">OnePlus</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-9">联想</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-10"><label class="form-check-label" for="formCheck-10">戴尔</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-11"><label class="form-check-label" for="formCheck-11">惠普</label></div>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="products">
                            <div class="row no-gutters">
                                <?php
                                foreach ($arrs as $arr) :
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
                                <?php endforeach; ?>
                            </div>
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item <?php if ($page == 1) {
                                                                echo "disabled";
                                                            } ?>"><a class="page-link" href="?page=1<?php
                                                                                                    if ($_GET['cate_id']) echo '&cate_id=' . $_GET['cate_id']; ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                    <li class="page-item <?php if ($page == 1) {
                                                                echo "disabled";
                                                            } ?>"><a class="page-link" href="?page=<?php echo $page - 1;
                                                                                                    if ($_GET['cate_id']) echo '&cate_id=' . $_GET['cate_id']; ?>" aria-label="Previous"><span aria-hidden="true">‹</span></a></li>
                                    <?php
                                    $start = $page - 2;
                                    $end = $page + 2;
                                    if ($page <= 3) {
                                        $start = 1;
                                        $end = 5;
                                    }
                                    if ($page >= $pages - 2) {
                                        $start = $pages - 4;
                                        $end = $pages;
                                    }
                                    if ($pages < 5) {
                                        $start = 1;
                                        $end = $pages;
                                    }
                                    for ($i = $start; $i <= $end; $i++) {
                                    ?>
                                        <li class="page-item <?php if ($i == $page) {
                                                                    echo "active";
                                                                } ?>"><a class="page-link" href="?page=<?php echo $i;
                                                                                                        if ($_GET['cate_id']) echo '&cate_id=' . $_GET['cate_id']; ?>"><?php echo $i; ?></a></li>
                                    <?php } ?>
                                    <li class="page-item <?php if ($page == $pages) {
                                                                echo "disabled";
                                                            } ?>"><a class="page-link" href="?page=<?php echo $page + 1;
                                                                                                    if ($_GET['cate_id']) echo '&cate_id=' . $_GET['cate_id']; ?>" aria-label="Previous"><span aria-hidden="true">›</span></a></li>
                                    <li class="page-item <?php if ($page == $pages) {
                                                                echo "disabled";
                                                            } ?>"><a class="page-link" href="?page=<?php echo $pages;
                                                                                                    if ($_GET['cate_id']) echo '&cate_id=' . $_GET['cate_id']; ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
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
<script>
    $('#cate').on('click', function(params) {
        var cateId = $("input[name='cate-radio']:checked").val();
        if (cateId) {
            document.location.href = 'catalog-page.php?cate_id=' + cateId;
        }

    })
</script>