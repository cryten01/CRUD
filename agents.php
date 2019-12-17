<?php include "./header.html" ?>

<h2>Agents</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Forname</th>
        <th>Surname</th>
        <th>Street</th>
        <th>Zipcode</th>
        <th>Place</th>
        <th>Phone</th>
        <th>Turnover</th>
        <th>Company ID</th>
    <?php showAllAgents(); ?>
</table>

<form action="post.php" method="post">
    <h4> Insert agent: </h4>
    <input type="text" name="insert_forname" placeholder="agent forname">
    <input type="text" name="insert_surname" placeholder="agent surname">
    <input type="text" name="insert_street" placeholder="street">
    <input type="text" name="insert_zipcode" placeholder="zipcode">
    <input type="text" name="insert_place" placeholder="place">
    <input type="text" name="insert_phone" placeholder="phone number">
    <input type="text" name="insert_turnover" placeholder="turnover">
    <input type="text" name="insert_comp_id" placeholder="company id">
    <button type="submit" name="insert_submitAgent">Insert</button>
    <h4> Update agent: </h4>
    <input type="text" name="update_id" placeholder="id">
    <input type="text" name="update_forname" placeholder="agent forname">
    <input type="text" name="update_surname" placeholder="agent surname">
    <input type="text" name="update_street" placeholder="street">
    <input type="text" name="update_zipcode" placeholder="zipcode">
    <input type="text" name="update_place" placeholder="place">
    <input type="text" name="update_phone" placeholder="phone number">
    <input type="text" name="update_turnover" placeholder="turnover">
    <input type="text" name="update_comp_id" placeholder="company id">
    <button type="submit" name="update_submitAgent">Update</button>
    <h4> Delete agent: </h4>
    <input type="text" name="delete_id" placeholder="id">
    <button type="submit" name="delete_submitAgent">Delete</button>
</form>

<?php include "./footer.html" ?>