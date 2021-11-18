<?php
    include "db.php";
    include "header.php";

    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
    else{
        $id='';
    }
?>


<div class="container">
    <div class="content" style="justify-content: space-between;display: flex;background: #fff;box-shadow: 0 10px 20px rgb(0 0 0 / 10%);border-radius: 8px;margin-top: 40px;">
        <div class="row" style="margin:0;padding:10px;">

        <?php 
        $rows=pg_query($cn,"select cc.store_code,cc.store_name,cc.store_image,phone,email,address,store_desc,cc.store_fb,store_ins,store_twitter from public.caphe cc where cc.id='$id'");
        while ($row = pg_fetch_assoc($rows)) {
            $code=$row['store_code'];
            $name=$row['store_name'];
            $image=$row['store_image'];
            $email=$row['email'];
            $phone=$row['phone'];
            $address=$row['address'];
            $description=$row['store_desc'];
        ?>
            <div class="col-6" style="padding: inherit;">
                <img src="image/Shop/<?php echo $image?>" class="img-fluid" alt="..." style="border-radius: 40px;">
                <div class="center" style="padding:20px;width:145px;height:auto;margin:auto;">
                    <div class="text-center">
                        <img src="image/Shop/<?php echo $image?>" class="img-fluid" alt="..." style="">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="info">
                    <h1> <?php echo $name?></h1>
                    <h5><span>Mã cửa hàng:</span> <?php echo $code?></h5>
                    <h5><span>Số điện thoại:</span> <?php echo $phone?></h5>
                    <h5><span>Email:</span> <?php echo $email?></h5>
                    <h5><span>Địa chỉ:</span> <?php echo $address?></h5>
                    <div class="description">
                    <p><?php echo $description?></p>
                    </div>
                    <div class="social-media">
                        <span><i class="bi bi-facebook"></i></span>
                        <span><i class="bi bi-twitter"></i></span>
                        <span><i class="bi bi-instagram"></i></span>
                    </div>
                    <button type="button" class="btn btn-warning"><a href="edit.php?id=<?php echo $id?>">Sửa thông tin</a></button>
                    <style>
                        .info .social-media span{
                            margin:10px;
                            font-size: x-large;
                            border-radius:50%;
                            background-color: #0bffff;
                            cursor: pointer;
                        }
                        .info{
                            padding: inherit;
                        }
                        span,p{
                            font-size: 16px;
                        }
                        p{

                            text-align: justify;
                        }
                        @media  (max-width: 768px) {
                            .center {
                                display: none;
                            }
                        }
                    </style>
                </div>
            </div>
        <?php }?>
        </div>
    </div>
</div>
<div class="container">
    <div class="owl-carousel owl-theme">
    <?php 
        $rows=pg_query($cn,"select cc.id,cc.store_image from public.caphe cc");
        while ($row = pg_fetch_assoc($rows)) {
            $image=$row['store_image'];
            $id=$row['id'];
        ?>
        <div class="item"><a href="detail.php?id=<?php echo $id?>"><img src="image/Shop/<?php echo $image?>" alt="" style="height:150px;"></a></div>
        <?php }?>
    </div>
</div>


<script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>