<?php 
include "db.php";

$id = $_POST['id'];
$name = $_POST['name'];
$size = $_POST['size'];
$quantity = $_POST['quantity'];
$model = $_POST['model'];
$location = $_POST['location'];
$purchase_date = $_POST['purchase_date'];
$notes = $_POST['notes'];

$imageSql = "";

if (!empty($_FILES['image']['name'])) {
    $imgName = time() . "_" . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $imgName);
    $imageSql = ", image='$imgName'";
}

$sql = "UPDATE items SET 
        name='$name', size='$size', quantity='$quantity',
        model='$model', location='$location', 
        purchase_date='$purchase_date', notes='$notes'
        $imageSql
        WHERE id=$id";

$conn->query($sql);

header("Location: index.php");
exit;
?>
