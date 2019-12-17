<?php include "./header.html" ?>

<h2>Buildings</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Price</th>
        <th>Type</th>
        <th>Size</th>
        <th>Address</th>
        <th>Status</th>
        <?php showAllBuildings(); ?>
</table>

<form action="includes/database.php" method="post">
    <br>
    <br>
    <b> Insert building: </b>
    <input type="text" name="insert_type" placeholder="type">
    <input type="text" name="insert_size" placeholder="size">
    <input type="text" name="insert_price" placeholder="price">
    <input type="text" name="insert_address" placeholder="address">
    <input type="text" name="insert_status" placeholder="status">
    <button type="submit" name="insert_submitBuilding">Insert</button>
    <br>
    <br>
    <b> Update building: </b>
    <input type="text" name="update_id" placeholder="id">
    <input type="text" name="update_type" placeholder="type">
    <input type="text" name="update_size" placeholder="size">
    <input type="text" name="update_price" placeholder="price">
    <input type="text" name="update_address" placeholder="address">
    <input type="text" name="update_status" placeholder="status">
    <button type="submit" name="update_submitBuilding">Update</button>
    <br>
    <br>
    <b> Delete building: </b>
    <input type="text" name="delete_id" placeholder="id">
    <button type="submit" name="delete_submitBuilding">Delete</button>
</form>

<?php include "./footerDB.html" ?>
