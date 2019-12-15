<?php
//phpinfo();

function connectToDb()
{
    $conn_string = "host=localhost port=5432 dbname=animals user=postgres password=1234";
    $dbConnection = pg_connect($conn_string) or die('Could not connect: ' . pg_last_error());
}

function showAll()
{
    $query = "SELECT * from animals ORDER BY id";
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());

    while ($value = pg_fetch_object($result)) {
        echo "<tr> <td>$value->id <td>$value->name";
    }
    pg_free_result($result);
}

function insert()
{
    $input_name = $_POST['insert_name'];
    $query_insert = "insert into animals (name) values ('$input_name');";
    $result = pg_query($query_insert) or die('Query failed: ' . pg_last_error());
}

function update()
{
    $input_id = $_POST['update_id'];
    $input_name = $_POST['update_name'];
    $query_update = "update animals set name = '$input_name' where id = '$input_id';";
    $query_insert = "insert into animals (name) values ('$input_name');";

    if (pg_affected_rows(pg_query($query_update)) > 0) {
        echo "Updated animal";
    } else {
        pg_query($query_insert);
        echo "Inserted animal";
    }
}

function delete()
{
    $input_id = $_POST['delete_id'];
    $query_delete = "delete from animals where id = '$input_id';";
    $result = pg_query($query_delete) or die('Query failed: ' . pg_last_error());
}


connectToDb();

if (isset($_POST['insert_submit'])) {
    insert();
    showAll();
    header("Location: ../index.php?insert=success");
}

if (isset($_POST['update_submit'])) {
    update();
    showAll();
    header("Location: ../index.php?update=success");
}

if (isset($_POST['delete_submit'])) {
    delete();
    showAll();
    header("Location: ../index.php?delete=success");
}

