<?php include "./header.html" ?>

<h2>Companies</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone number</th>
        <th>Turnover</th>
    <?php showAllCompanies() ?>
</table>

<form action="includes/post.php" method="post">
    <br>
    <br>
    <b> Insert company: </b>
    <input type="text" name="insert_name" placeholder="company name">
    <input type="text" name="insert_address" placeholder="address">
    <input type="text" name="insert_phone" placeholder="phone number">
    <input type="text" name="insert_turnover" placeholder="turnover">
    <button type="submit" name="insert_submitCompany">Insert</button>
    <br>
    <br>
    <b> Update company: </b>
    <input type="text" name="update_id" placeholder="id">
    <input type="text" name="update_name" placeholder="company name">
    <input type="text" name="update_address" placeholder="address">
    <input type="text" name="update_phone" placeholder="phone number">
    <input type="text" name="update_turnover" placeholder="turnover">
    <button type="submit" name="update_submitCompany">Update</button>
    <br>
    <br>
    <b> Delete company: </b>
    <input type="text" name="delete_id" placeholder="id">
    <button type="submit" name="delete_submitCompany">Delete</button>
</form>

<?php include "./footerDB.html" ?>