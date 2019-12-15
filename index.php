<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Animal database </title>
</head>

<body>

<?php include_once 'includes/database.php'; ?>

<h2>Animals</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <?php showAll() ?>
</table>

<form action="includes/database.php" method="post">
    <br>
    <br>
    <b> Insert animal: </b>
    <input type="text" name="insert_name" placeholder="new animal name">
    <button type="submit" name="insert_submit">Insert</button>
    <br>
    <br>
    <b> Update animal: </b>
    <input type="text" name="update_id" placeholder="id">
    <input type="text" name="update_name" placeholder="new animal name">
    <button type="submit" name="update_submit">Update</button>
    <br>
    <br>
    <b> Delete animal: </b>
    <input type="text" name="delete_id" placeholder="id">
    <button type="submit" name="delete_submit">Delete</button>
</form>

</body>

</html>


