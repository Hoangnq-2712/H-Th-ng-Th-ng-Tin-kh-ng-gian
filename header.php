<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./style.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <link rel="stylesheet" href="owlcarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="owlcarousel/dist/assets/owl.theme.default.min.css">


        <script type="text/javascript" src="jquery-3.6.0.js"></script>
        <script src="owlcarousel/dist/owl.carousel.min.js"></script>

<!-- map -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css">
<script src="./ol.css" type="text/javascript"></script>
<script src="./ol.js" type="text/javascript"></script>


<style>
        .map {
            height: 600px;
            width: 70%;
            float: left;
            margin-left: 20px;
            margin-right: 20px;
        }

        .map {
            border: 1px solid #000;
        }
    </style>
 
<script type="text/javascript">
$("#document").ready(function () {
var format = 'image/png';
 
var bounds = [105.75872802734375, 21.009902954101562,
105.82250213623047, 21.049697875976562 ];
var Roads = new ol.layer.Image({
source: new ol.source.ImageWMS({
ratio: 1,
url: 'http://localhost:8080/geoserver/baithi/wms',
params: {
'FORMAT': format,
'VERSION': '1.1.1',
STYLES: '',
LAYERS: 'baithi:roads',
}
})
});

var caphe = new ol.layer.Image({
source: new ol.source.ImageWMS({
ratio: 1,
url: 'http://localhost:8080/geoserver/baithi/wms',
params: {
'FORMAT': format,
'VERSION': '1.1.0',
STYLES: '',
LAYERS: 'baithi:caphe',
}
})
});


var hanoi = new ol.layer.Image({
source: new ol.source.ImageWMS({
ratio: 1,
url: 'http://localhost:8080/geoserver/baithi/wms',
params: {
'FORMAT': format,
'VERSION': '1.1.0',
STYLES: '',
LAYERS: 'baithi:Hanoi',
}
})
});

//
var natural = new ol.layer.Image({
source: new ol.source.ImageWMS({
ratio: 1,
url: 'http://localhost:8080/geoserver/baithi/wms',
params: {
'FORMAT': format,
'VERSION': '1.1.0',
STYLES: '',
LAYERS: 'baithi:natural',
}
})
});

var landuse = new ol.layer.Image({
source: new ol.source.ImageWMS({
ratio: 1,
url: 'http://localhost:8080/geoserver/baithi/wms',
params: {
'FORMAT': format,
'VERSION': '1.1.0',
STYLES: '',
LAYERS: 'baithi:landuse',
}
})
});


var railways = new ol.layer.Image({
source: new ol.source.ImageWMS({
ratio: 1,
url: 'http://localhost:8080/geoserver/baithi/wms',
params: {
'FORMAT': format,
'VERSION': '1.1.0',
STYLES: '',
LAYERS: 'baithi:railways',
}
})
});

var buidling = new ol.layer.Image({
source: new ol.source.ImageWMS({
ratio: 1,
url: 'http://localhost:8080/geoserver/baithi/wms',
params: {
'FORMAT': format,
'VERSION': '1.1.0',
STYLES: '',
LAYERS: 'baithi:buildings',
}
})
});


var projection = new ol.proj.Projection({
code: 'EPSG:4326',
          units: 'degrees',
          axisOrientation: 'neu',
          global: true
});
// hien thi len ban do gom cac thanh phan
var map = new ol.Map({
target: 'map',
layers: [
hanoi,Roads,natural,railways,buidling,landuse,caphe
],
view: new ol.View({
projection: projection
})
});
// map.getView().fitExtent(bounds, map.getSize());
map.getView().fit(bounds, map.getSize());
$("#chkRoads").change(function () {
if($("#chkRoads").is(":checked"))
{
Roads.setVisible(true);
}
else
{
Roads.setVisible(false);
}
});

$("#chkLanduse").change(function () {
if($("#chkLanduse").is(":checked"))
{
landuse.setVisible(true);
}
else
{
landuse.setVisible(false);
}
});


$("#chkNatural").change(function () {
if($("#chkNatural").is(":checked"))
{
natural.setVisible(true);
}
else
{
natural.setVisible(false);
}
});

$("#chkRailway").change(function () {
if($("#chkRailway").is(":checked"))
{
railways.setVisible(true);
}
else
{
railways.setVisible(false);
}
});


$("#chkhanoi").change(function () {
if($("#chkhanoi").is(":checked"))
{
hanoi.setVisible(true);
}
else
{
hanoi.setVisible(false);
}
});

$("#chkcaphe").change(function () {
if($("#chkcaphe").is(":checked"))
{
caphe.setVisible(true);
}
else
{
caphe.setVisible(false);
}
});

$("#chkBuilding").change(function () {
if($("#chkBuilding").is(":checked"))
{
buidling.setVisible(true);
}
else
{
buidling.setVisible(false);
}
});







map.on('singleclick', function (evt) {
var view = map.getView();
var viewResolution = view.getResolution();
var source = natural.getSource();
var url = source.getGetFeatureInfoUrl(
evt.coordinate, viewResolution, view.getProjection(),
{ 'INFO_FORMAT': 'application/json', 'FEATURE_COUNT': 50 });
if (url) {
$.ajax({
type: "POST",
url: url,
contentType: "application/json; charset=utf-8",
dataType: 'json',
success: function (n) {
var content = "<table>";
for (var i = 0; i < n.features.length; i++) {
var feature = n.features[i];
var featureAttr = feature.properties;
content += "<tr><td>Tên:</td><td>" + featureAttr["name"] + "</td></tr>"
                                + "<tr><td>Loại :</td><td>" + featureAttr["type"] + "</td></tr>"
}
content += "</table>";
$("#info").html(content);
}
});
}
});



});

</script>
    </head>
    <body>
    <div class="container-fluid" style="background-color:orange;">
        <div class="logo" style="height: 50px; padding:14px;"><a href="index.php">
            <img src="image/logo.png" alt=""style="margin-left:auto; margin-right:auto; display: block;" ></a>
        </div>
    </div>