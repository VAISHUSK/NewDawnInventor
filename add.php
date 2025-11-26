<?php 
include "db.php";

$name = $_POST['name'];
$size = $_POST['size'];
$quantity = $_POST['quantity'];
$model = $_POST['model'];
$location = $_POST['location'];
$purchase_date = $_POST['purchase_date'];
$notes = $_POST['notes'];

$imgName = "";

if (!empty($_FILES['image']['name'])) {
    $imgName = time() . "_" . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $imgName);
}

$sql = "INSERT INTO items (name,size,quantity,model,location,purchase_date,notes,image)
        VALUES ('$name','$size','$quantity','$model','$location','$purchase_date','$notes','$imgName')";

$conn->query($sql);

header("Location: index.php");
exit;
?>
