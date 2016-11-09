<?php
if(isset($_POST['submit'])) {
    if(getimagesize($_FILES['image']['tmp_name']) == false) {
        echo "Please select an image.";
    }
    else {
        $image = addcslashes($_FILES['image']['tmp_name']);
        $name = addcslashes($_FILES['image']['name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);
        saveimage($name,$image);
    }
}
displayimage();
function saveimage() {
    $connect = mysqli_connect("localhost","root","admin", "ezskins");
    $image = "";
    $name = "";
    $result = mysqli_query($connect, "insert into images (name,image) values ('$name','$image')");
    if($result) {
        echo "<br>Image Uploaded.";
    }
    else {
        echo "<br> Image NOT Uploaded.";
    }
}
function displayimage() {
    $connect = mysqli_connect("localhost","root","admin", "ezskins");
    $result = mysqli_query($connect, "select * from images");
    while($row = mysqli_fetch_array($result)) {
        echo '<img height="300px" width="300px" src="data:image;base64,'.$row[2].' ">';
    }
    mysqli_close($connect);
}
?>
<html>
<body>
<form method="post" enctype="multipart/form-data">
    <br>
        <input type="file" name="image">
        <br>
        <input type="submit" name="submit" value="Upload">
</form>

</body>


</html>
