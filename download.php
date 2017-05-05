<html>
<?php
$all = glob("images/*.*");
for($i=0;$i<count($all);$i++){
$image_name = $all[$i];
$str = $image_name;

echo <<<HTML
<style>
.container{
    float:left;
}
.chips img{
    width: 200px;
    height: 200px;
    border-radius:6px 6px 6px 6px;
    padding-right:15px;
    
}
</style>
</head>
<div class=".container">
<div class="chips">
<img src=$image_name >
<br>
<a href=$image_name download=$image_name>download</a>
</div>
</div>
HTML;
}
?>
    
<body>
   
    
</body>
</html>