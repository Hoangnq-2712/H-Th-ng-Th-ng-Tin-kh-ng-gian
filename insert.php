<?php
include "db.php";
include "header.php";


// if (isset($_POST['code'])) {
//     $code = $_POST['code'];
// } else
//     $code = '';
if (isset($_POST['name'])) {
    $name = $_POST['name'];
} else
    $name = '';
if (isset($_POST['geom1'])) {
    $geom1 = $_POST['geom1'];
} else
    $geom1 = '';
if (isset($_POST['geom2'])) {
    $geom2 = $_POST['geom2'];
} else
    $geom2 = '';
    
// if (isset($_POST['image'])) {
//     $image = $_POST['image'];
// } else
//     $image = 'a';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else
    $email = '';
if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
} else
    $phone = '';
if (isset($_POST['address'])) {
    $address = $_POST['address'];
} else
    $address = '';
if (isset($_POST['description'])) {
    $description = $_POST['description'];
} else
    $description = '';
if (isset($_POST['facebook'])) {
    $facebook = $_POST['facebook'];
} else
    $facebook = '';
if (isset($_POST['twitter'])) {
    $twitter = $_POST['twitter'];
} else
    $twitter = '';
if (isset($_POST['instagram'])) {
    $instagram = $_POST['instagram'];
} else
    $instagram = '';

// $result=pg_query($cn,"INSERT INTO cuahang (store_code,store_name,geom,store_image,phone,email,address,store_desc,store_fb) VALUES (
//     '$code','$name','ST_GeomFromText('POINT($geom1 $geom2)', 26910)','$image','$phone','$email','$address','$description','$facebook')");

// if(!empty($code)){
//     $result=pg_query($cn,"INSERT INTO cuahang (store_code,store_name,geom,store_image,phone,email,address,store_desc,store_fb) VALUES (
//         '$code','$name',ST_GeomFromText('POINT($geom1 $geom2)', 26910),'$image','$phone','$email','$address','$description','$facebook')");   
//  }
?>
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Thêm cửa hàng</div>
        <div class="panel-body">
            <button type="button" class="btn btn-info pull-right"><a href="index.php">Quay lại</a></button>
        </div>
        <form class="form-horizontal" method="post">
            <div class="panel-body">
                <!-- <div class="form-group">
                    <label class="control-label col-sm-2">Mã cửa hàng:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <input class="form-control" value="" type="text" name="code">
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Tên Cửa Hàng:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <input class="form-control" value="" type="text" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">geom:<span style='color:red'>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="Geom1" name="geom1">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="Geom2" name="geom2">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Hình ảnh:<span style='color:red'>*</span></label>
                    <!-- <div class="col-sm-5"> -->
                        <input type="file" name="image">
                    <!-- </div> -->
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Email:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <input class="form-control" value="" type="email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Số điện thoại:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <input class="form-control" value="" type="number" name="phone" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Địa chỉ:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <textarea rows="2" cols="5" class="form-control" name="address" required>abc</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Thông tin:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <textarea rows="5" cols="5" class="form-control" name="description" required>acv</textarea>
                    </div>
                    <input type="hidden" value="" name="id">
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Facefook:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <input class="form-control" value="" type="text" name="facebook" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">twitter:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <input class="form-control" value="" type="text" name="twitter" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">instagram:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <input class="form-control" value="" type="text" name="instagram" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2"> </label>
                    <div class="col-sm-5">
                        <input type="submit" class="btn btn-success" value="Gửi" name="new">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
        $rows=pg_query($cn,"select max(id) from public.caphe cc");
        $row=pg_fetch_assoc($rows);
        if($row)
        {
            $max=$row['max'];
            $max++;
        }
        if(isset($_POST['image'])){
            $image = $_POST['image'];
        }else{
            $image='';
        }
        
        // echo 'hdsj'.$image;
    if(isset($_POST['new'])){
    $result=pg_query($cn,"INSERT INTO caphe(store_code,store_name,geom,store_image,phone,email,address,store_desc,store_fb,store_ins,store_twitter) VALUES (
        'CH$max','$name',ST_SetSRID(ST_MakePoint(0, 0), 4326),'$image',$phone,'$email','$address','$description','$facebook','$instagram','$twitter')");
        }
?>
</div>
<?php include 'footer.php' ?>