<?php
    include 'header.php';
    $sql_rec = "SELECT g.goods_id, g.goods_name, g.max_price, i.img_url FROM goods g, img i WHERE g.goods_id=i.goods_id AND g.is_rec='1' AND g.is_up='1' LIMIT 6";
    $rec_res = $mySQLi->query($sql_rec);
    if(!array_key_exists('uid',$_SESSION)){
        include '404.php';
        exit;
    }
?>
    <main class="page">
        <section class="clean-block clean-form dark">  
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">资料编辑</h2>
                </div>
                <form>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-usern">用户名@</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-usern" id="user-name">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="sex">性别</label>
                            </div>
                            <select class="custom-select" id="sex">
                                <option value="0" id="opt0">保密</option>
                                <option value="1" id="opt1">男</option>
                                <option value="2" id="opt2">女</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">年龄</span>
                            </div>
                            <input type="number" class="form-control" id="age">
                            <div class="input-group-append">
                                <span class="input-group-text">岁</span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-lg btn-block" id="update-profile">更新个人资料</button>
                </form>
                
            </div>
        </section>
        <section class="clean-block">
            <div class="container">
                <div class="card-group">
                    <div class="card text-center">
                        <div class="card-header">
                        猜你喜欢
                        </div>
                        <div class="row">
                            <?php
                            //循环输出商品信息 
                                if(!empty($rec_res)):
                                    while ($val = mysqli_fetch_array($rec_res)):
                            ?>

                            <div class="col-md-6 col-lg-4 item ">
                                <div class="product-show-container">
                                    <div class="product-img">
                                        <a href="product-page.php?gd_id=<?php echo $val['goods_id']; ?>" target="_blank">
                                            <img src="assets/img/goods_img/<?php echo $val['img_url']; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="product-show-info">
                                        <a href="product-page.php?gd_id=<?php echo $val['goods_id']; ?>" target="_blank">
                                            <p>
                                                <?php
                                                    echo $val['goods_name'];
                                                ?>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="product-price">
                                        <p>
                                            <?php
                                                echo '￥'.$val['max_price'];
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile;?>
                            <?php endif;?>
                        </div>
                        <div class="card-footer text-muted">
                            <a href="index.php" class="btn btn-primary">查看更多</a>
                        </div>
                    </div>
                </div>                
            </div>
        </section>
    </main>
    <script>
        $(document).ready(
            function () {
                $.ajax({
                    type: "POST",
                    url: "center_fetch.php",
                    dataType: "json",
                    success: function (data) {
                        if(data.status == 'ok'){
                            $('#user-name').attr('value',data.userdata.username);

                            if(data.userdata.sex == 0){
                                $('#opt0').attr('selected','selected');
                            }else if(data.userdata.sex == 1){
                                $('#opt1').attr('selected','selected');
                            }else if(data.userdata.sex == 2){
                                $('#opt2').attr('selected','selected');
                            }else{
                                console.log("Sex data error");
                            }
                            $('#age').attr('value',data.userdata.age);
                        }else{
                            $('#b-content1').slideUp();
                            alert("无此用户！");
                        }
                    }
                });
            }
        );
        $('#update-profile').click(function () {
            var name = $('#user-name').val();
            var sex = $('#sex').val();
            var age = $('#age').val();
            layui.use('layer', function () {
                    var layer = layui.layer;
                    if(name == ''){
                        layer.msg('用户名不能为空！');
                        return;
                    }
                    if(age<=0){
                        layer.msg('请输入有效的年龄！');
                        return;
                    }
                    $.ajax({
                        type: "POST",
                        url: "update_profile.php",
                        data: {
                            name: name,
                            sex: sex,
                            age: age
                        },
                        success:function () {
                            layer.msg('资料更新成功！',{ shift:-1, time: 1000 },function () {
                                document.location.href='profile_edit.php';
                            });
                            },error:function () {
                            alert("error");
                        }
                    });
            } );
        });
    </script>
<?php
    include 'footer.php';
?>
