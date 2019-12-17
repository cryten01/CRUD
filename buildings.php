<?php include "./header.html" ?>

<h2>Buildings</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Price</th>
        <th>Street</th>
        <th>Zipcode</th>
        <th>Place</th>
        <th>Size</th>
        <th>Status</th>
        <th>Type</th>
        <?php showAllBuildings(); ?>
</table>

<form action="post.php" method="post">
    <h4> Insert building: </h4>
    <select type="text" name="insert_type">
        <option value="land">land</option>
        <option value="house">house</option>
        <option value="flat">flat</option>
    </select>
    <input type="text" name="insert_size" placeholder="size">
    <input type="text" name="insert_price" placeholder="price">
    <input type="text" name="insert_street" placeholder="street">
    <input type="text" name="insert_zipcode" placeholder="zipcode">
    <input type="text" name="insert_place" placeholder="place">
    <select type="text" name="insert_status">
        <option value="active">active</option>
        <option value="inactive">inactive</option>
    </select>
    <button type="submit" name="insert_submitBuilding">Insert</button>

    <h4> Update building: </h4>
    <input type="text" name="update_id" placeholder="id">
    <select type="text" name="update_type">
        <option value="land">land</option>
        <option value="house">house</option>
        <option value="flat">flat</option>
    </select>
    <input type="text" name="update_size" placeholder="size">
    <input type="text" name="update_price" placeholder="price">
    <input type="text" name="update_street" placeholder="street">
    <input type="text" name="update_zipcode" placeholder="zipcode">
    <input type="text" name="update_place" placeholder="place">
    <select type="text" name="update_status">
        <option value="active">active</option>
        <option value="inactive">inactive</option>
    </select>
    <button type="submit" name="update_submitBuilding">Update</button>

    <h4> Delete building: </h4>
    <input type="text" name="delete_id" placeholder="id">
    <button type="submit" name="delete_submitBuilding">Delete</button>
</form>

<?php include "./footer.html" ?>
