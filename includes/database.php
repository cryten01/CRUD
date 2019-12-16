<?php
//phpinfo();

function connectToDb()
{
    $conn_string = "host=localhost port=5432 dbname=realestate user=postgres password=1234";
    $dbConnection = pg_connect($conn_string) or die('Could not connect: ' . pg_last_error());
}

function showAllCompanies()
{
    $query = "SELECT * from companies ORDER BY id";
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());

    while ($value = pg_fetch_object($result)) {
        echo "<tr> <td>$value->id <td>$value->name <td>$value->address <td>$value->phone_number <td>$value->turnover";
    }
    pg_free_result($result);
}

function showAllAgents()
{
    $query = "SELECT * from agents ORDER BY id";
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());

    while ($value = pg_fetch_object($result)) {
        echo "<tr> <td>$value->id <td>$value->forname <td>$value->surname <td>$value->address <td>$value->phone_number <td>$value->turnover";
    }
    pg_free_result($result);
}

function insertCompany()
{
    $input_id = $_POST['insert_id'];
    $input_name = $_POST['insert_name'];
    $input_address = $_POST['insert_address'];
    $input_phone = $_POST['insert_phone'];
    $input_turnover = $_POST['insert_turnover'];

    $query_insert = "insert into companies (name, address, phone_number, turnover)
    values ('$input_name', '$input_address', '$input_phone', '$input_turnover')";

    $result = pg_query($query_insert) or die('Query failed: ' . pg_last_error());
}

function insertAgent()
{
    $input_id = $_POST['insert_id'];
    $input_forname = $_POST['insert_forname'];
    $input_surname = $_POST['insert_surname'];
    $input_address = $_POST['insert_address'];
    $input_phone = $_POST['insert_phone'];
    $input_turnover = $_POST['insert_turnover'];

    $query_insert = "insert into agents (forname, surname, address, phone_number, turnover)
    values ('$input_forname', '$input_surname', '$input_address', '$input_phone', '$input_turnover')";

    $result = pg_query($query_insert) or die('Query failed: ' . pg_last_error());
}


function update()
{
    $input_id = $_POST['update_id'];
    $input_name = $_POST['update_name'];
    $input_address = $_POST['update_address'];
    $input_phone = $_POST['update_phone'];
    $input_turnover = $_POST['update_turnover'];

    $query_update = "update companies set name = '$input_name', address = '$input_address', phone_number = '$input_phone', turnover = '$input_turnover' where id = '$input_id';";
    $query_insert = "insert into companies (name, address, phone_number, turnover)
    values ('$input_name', '$input_address', '$input_phone', '$input_turnover')";

    if (pg_affected_rows(pg_query($query_update)) > 0) {
        echo "Updated company";
    } else {
        pg_query($query_insert);
        echo "Inserted company";
    }
}

function delete()
{
    $input_id = $_POST['delete_id'];
    $query_delete = "delete from companies where id = '$input_id';";
    $result = pg_query($query_delete) or die('Query failed: ' . pg_last_error());
}


connectToDb();

if (isset($_POST['insert_submit'])) {
    insertCompany();
    showAllCompanies();
    header("Location: ../index.php?insert=success");
}

if (isset($_POST['update_submit'])) {
    update();
    showAllCompanies();
    header("Location: ../index.php?update=success");
}

if (isset($_POST['delete_submit'])) {
    delete();
    showAllCompanies();
    header("Location: ../index.php?delete=success");
}

if (isset($_POST['insert_submitAgent'])) {
    insertAgent();
    showAllAgents();
    header("Location: ../agents.php?insert=success");
}

