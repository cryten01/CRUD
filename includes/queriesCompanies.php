<?php

function insertCompany()
{
    $input_name = $_POST['insert_name'];
    $input_address = $_POST['insert_address'];
    $input_phone = $_POST['insert_phone'];
    $input_turnover = $_POST['insert_turnover'];

    $query_insert = "insert into companies (name, address, phone_number, turnover)
    values ('$input_name', '$input_address', '$input_phone', '$input_turnover')";

    $result = pg_query($query_insert) or die('Query failed: ' . pg_last_error());
}

function updateCompany()
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

function showAllCompanies()
{
    $query = "SELECT * from companies ORDER BY id";
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());

    while ($value = pg_fetch_object($result)) {
        echo "<tr> <td>$value->id <td>$value->name <td>$value->address <td>$value->phone_number <td>$value->turnover";
    }
    pg_free_result($result);
}