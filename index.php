<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Inventory Management</h1>

<div class="top">
    <input type="text" id="search" placeholder="Search items...">
    <button onclick="openAdd()">Add Item</button>
</div>

<table>
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Size</th>
            <th>Qty</th>
            <th>Model</th>
            <th>Location</th>
            <th>Purchase Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="tableBody">
        <?php
            $result = $conn->query("SELECT * FROM items ORDER BY id DESC");
            while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>".(!empty($row['image']) ? "<img src='uploads/".$row['image']."' class='thumb'>" : "-")."</td>
        <td>".(isset($row['name']) ? $row['name'] : '-')."</td>
        <td>".(isset($row['size']) ? $row['size'] : '-')."</td>
        <td>".(isset($row['quantity']) ? $row['quantity'] : '-')."</td>
        <td>".(isset($row['model']) ? $row['model'] : '-')."</td>
        <td>".(isset($row['location']) ? $row['location'] : '-')."</td>
        <td>".(isset($row['purchase_date']) ? $row['purchase_date'] : '-')."</td>
        <td>
            <button onclick='openEdit(".json_encode($row).")'>Edit</button>
            <a class='del' href='delete.php?id=".$row['id']."' onclick='return confirm(\"Delete this item?\");'>Delete</a>
        </td>
    </tr>";
}

        ?>
    </tbody>
</table>

<!-- modal -->
<div id="modal" class="modal">
    <div class="modal-content" id="modalContent"></div>
</div>

<script src="script.js"></script>
</body>
</html>
