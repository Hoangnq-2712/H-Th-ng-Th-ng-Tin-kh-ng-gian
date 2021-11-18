<?php
ob_start();

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
    <div class="panel panel-info">
        <div class="panel-heading">Danh sách cửa hàng</div>
        <div class="panel-body">
            <button type="button" class="btn btn-info pull-right"><a href="index.php">Quay lại</a></button>
        </div>
        <?php 
        $rows=pg_query($cn,"select cc.store_code,cc.store_name,cc.store_image,phone,email,address,store_desc,cc.store_fb,cc.store_ins,cc.store_twitter from public.caphe cc where cc.id='$id'");
        $row=pg_fetch_assoc($rows);
        if($row)
        {
            $code=$row['store_code'];
            $name=$row['store_name'];
            $img=$row['store_image'];
            $email=$row['email'];
            $phone=$row['phone'];
            $address=$row['address'];
            $description=$row['store_desc'];
            $facebook=$row['store_fb'];
            $instagram=$row['store_ins'];
            $twitter=$row['store_twitter'];
        //}
        ?>
        <form class="form-horizontal" method="post" > 
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-2">Tên Cửa Hàng:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <input class="form-control" value="<?php echo $name; ?>" type="text" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Hình ảnh:<span style='color:red'>*</span></label>
                    <div class="row">
                        <div class="col-2">
                            <img src="./image/Shop/<?php echo $img;?>" alt="" width='80' height='60'>
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="file" name="image">
                        </div>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Email:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <input class="form-control" value="<?php echo $email; ?>" type="email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Số điện thoại:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <input class="form-control" value="<?php echo $phone; ?>" type="number" name="phone" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Thông tin:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <textarea rows="5" cols="5" class="form-control" name="description" required><?php echo $description; ?></textarea>
                    </div>
                    <!-- <input type="hidden" value="" name="id"> -->
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Facefook:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <input class="form-control" value="<?php echo $facebook; ?>" type="text" name="facebook" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">twitter:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <input class="form-control" value="<?php echo $twitter; ?>" type="text" name="twitter" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">instagram:<span style='color:red'>*</span></label>
                    <div class="col-sm-5">
                        <input class="form-control" value="<?php echo $instagram; ?>" type="text" name="instagram" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2"> </label>
                    <div class="col-sm-5">
                        <input type="submit" class="btn btn-success" value="Gửi" name='new'>
                    </div>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>

<?php
// echo $img;

if (isset($_POST['new'])){
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    } else{
        $name = '';
    }
    if (isset($_POST['image'])) {
        $image = $_POST['image'];
    } else{$image = $img;}
    
        
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else{$email = '';}
        
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
    } else{$phone = '';}
    
    if (isset($_POST['description'])) {
        $description = $_POST['description'];
    } else{    $description = '';}
    
    
    if (isset($_POST['facebook'])) {
        $facebook = $_POST['facebook'];
    } else{    $facebook = '';}
    
    if (isset($_POST['twitter'])) {
        $twitter = $_POST['twitter'];
    } else{    $twitter = '';}
    
    if (isset($_POST['instagram'])) {
        $instagram = $_POST['instagram'];
    } else{    $instagram = '';}
    
    $result = pg_query($cn, "UPDATE caphe SET 
    store_name = '$name',
    store_image = '$image',
    email = '$email',
    phone = '$phone',
    store_desc = '$description',
    store_fb = '$facebook',
    store_ins = '$instagram',
    store_twitter = '$twitter'
    where id='$id' ");
        if (!$result){
            echo "Update failed!!";
        }else
        {
        echo "Update successfull;";
         header('Location: index.php');
        } 
    }
?>

</div>

<?php
include 'footer.php';

?>