<?php
    include "db.php";
    include "header.php";


    if(isset($_GET['action']))
    {
        $action=$_GET['action'];
    }
    else
    {
        $action="";
    }
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
    }   
    else
    {
        $id=0;
    }

?>
    <div class="container-fluid" style="background-color:#ffb141;padding:25px;">
        <div class="container">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="image/baner.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="image/baner1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="image/baner2.png" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color:#ffe7ba;padding:20px;">
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Cửa hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Giới thiệu</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">Danh sách cửa hàng</div>
            <div class="panel-body">
                <button type="button" class="btn btn-info pull-right"><a href="insert.php">Thêm cửa hàng</a></button>
            </div>
            <div style="height: 400px;overflow-y: scroll;">
                <table class="table table-striped table-bordered" >
            <thead>
                <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên quán</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $rows=pg_query($cn,"SELECT * FROM public.caphe ORDER BY id ASC ");
                $sn=1;
                while ($row = pg_fetch_assoc($rows)) {
                    $id=$row['id'];
                    $name=$row['store_name'];
                    $email=$row['email'];
                    $phone=$row['phone'];
                    $address=$row['address'];
                    ?>
                <tr>
                    <th scope="row"><?=$sn++?></th>
                    <td><?php echo $name;?></td>
                    <td><?php echo $address;?></td>
                    <td><?php echo $phone;?></td>
                    <td>
                        <form method="get">
                            <button type="button" class="btn btn-warning"><a href="detail.php?id=<?php echo $id?>">Xem thêm</a></button>
                            <button type="button" class="btn btn-success"><a href="edit.php?id=<?php echo $id?>">Sửa</a></button> 
                            <button type="button" class="btn btn-danger"><a href="index.php?action=delete&id=<?php echo $id?>" id="result">Xóa</a></button>
                        </form>
                        <!-- <script>
                            var result = confirm("Bạn có muốn xóa bản ghi này?");
                            if (result == true) {
                                alert("Bạn đồng ý xóa");
                            } else {
                                alert("Bạn không xóa");
                            }
                        </script> -->
                        <!-- 
                        <form method="post">
                            <button type="button" class="btn btn-warning" onclick="window.location.href='footer.php'">Xem thêm</button>
                            <button type="button" class="btn btn-success">Sửa</button> 
                            <button type="button" class="btn btn-danger">Xóa</button>
                        </form>    
                        -->
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
            </div>
        </div>
    <?php 	
    switch ($action) {
	    case 'delete':
			pg_query($cn,"delete from public.caphe where id=$id");
            echo "Xóa thành công";
			break;
		}
    ?>
    </div>
    <div class="container-fluid">

        <div id="map" class="map"></div>
        <div id="checkmap" class="checkmap">
        <input type="checkbox" id="chkRoads" checked style="float:left"/><label for="chkRoads" style="float:left; margin-right: 20px">Roads</label>
        <img src="http://localhost:8080/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=baithi:roads" />
        </div><br>
        <div id="checkmap" class="checkmap">
        <input type="checkbox" id="chkLanduse" checked style="float:left"/><label for="chkLanduse" style="float:left; margin-right: 20px">Landuse</label>
        <img src="http://localhost:8080/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=baithi:landuse" />
        </div><br>
        <div id="checkmap" class="checkmap">
        <input type="checkbox" id="chkNatural" checked  style="float:left"/><label for="chkNatural" style="float:left; margin-right: 20px">Natural</label>
        <img src="http://localhost:8080/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=baithi:natural" />
        </div><br>
        <div id="checkmap" class="checkmap">
        <input type="checkbox" id="chkRailway" checked style="float:left"/><label for="chkRailway" style="float:left; margin-right: 20px">Railways</label>
        <img src="http://localhost:8080/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=baithi:railways" />
        </div><br>
        <div id="checkmap" class="checkmap">
        <input type="checkbox" id="chkcaphe" checked style="float:left"/><label for="chkcaphe" style="float:left; margin-right: 20px">caphe</label>
        <img src="http://localhost:8080/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=baithi:caphe" />
        </div><br>
        <div id="checkmap" class="checkmap">
        <input type="checkbox" id="chkhanoi" checked style="float:left"/><label for="chkhanoi" style="float:left; margin-right: 20px">hanoi</label>
        <img src="http://localhost:8080/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=baithi:Hanoi" />
        </div><br>
        <div id="checkmap" class="checkmap">
            <input type="checkbox" id="chkBuilding" checked style="float:left"/><label for="chkBuilding" style="float:left; margin-right: 20px">Building</label>
            <img src="http://localhost:8080/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=baithi:buildings" />
        </div>
        
         
        <div id="info" style="width:500px;height:500px;display: flex;">
            
            </div>


    </div>

<br><br>

<?php include 'footer.php';?>
