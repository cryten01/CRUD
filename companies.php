<?php include "./header.html" ?>

<h2>Companies</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Street</th>
        <th>Zipcode</th>
        <th>Place</th>
        <th>Phone</th>
        <th>Turnover</th>
    <?php showAllCompanies() ?>
</table>

<form action="post.php" method="post">
    <h4> Insert company: </h4>
    <input type="text" name="insert_name" placeholder="company name">
    <input type="text" name="insert_street" placeholder="street">
    <input type="text" name="insert_zipcode" placeholder="zipcode">
    <input type="text" name="insert_place" placeholder="place">
    <input type="text" name="insert_phone" placeholder="phone number">
    <input type="text" name="insert_turnover" placeholder="turnover">
    <button type="submit" name="insert_submitCompany">Insert</button>
    <h4> Update company: </h4>
    <input type="text" name="update_id" placeholder="id">
    <input type="text" name="update_name" placeholder="company name">
    <input type="text" name="update_street" placeholder="street">
    <input type="text" name="update_zipcode" placeholder="zipcode">
    <input type="text" name="update_place" placeholder="place">
    <input type="text" name="update_phone" placeholder="phone number">
    <input type="text" name="update_turnover" placeholder="turnover">
    <button type="submit" name="update_submitCompany">Update</button>
    <h4> Delete company: </h4>
    <input type="text" name="delete_id" placeholder="id">
    <button type="submit" name="delete_submitCompany">Delete</button>
</form>

<?php include "./footer.html" ?>