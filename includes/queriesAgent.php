<?php

function insertAgent()
{
    $input_forname = $_POST['insert_forname'];
    $input_surname = $_POST['insert_surname'];
    $input_address = $_POST['insert_address'];
    $input_phone = $_POST['insert_phone'];
    $input_turnover = $_POST['insert_turnover'];

    $query_insert = "insert into agents (forname, surname, address, phone_number, turnover)
    values ('$input_forname', '$input_surname', '$input_address', '$input_phone', '$input_turnover')";

    $result = pg_query($query_insert) or die('Query failed: ' . pg_last_error());
}

function updateAgent()
{
    $input_id = $_POST['update_id'];
    $input_forname = $_POST['update_forname'];
    $input_surname = $_POST['update_surname'];
    $input_address = $_POST['update_address'];
    $input_phone = $_POST['update_phone'];
    $input_turnover = $_POST['update_turnover'];

    $query_update = "update agents set forname = '$input_forname', surname = '$input_surname', address = '$input_address', phone_number = '$input_phone', turnover = '$input_turnover' where id = '$input_id';";
    $query_insert = "insert into agents (forname, surname, address, phone_number, turnover)
    values ('$input_forname', '$input_surname', '$input_address', '$input_phone', '$input_turnover')";

    if (pg_affected_rows(pg_query($query_update)) > 0) {
        echo "Updated company";
    } else {
        pg_query($query_insert);
        echo "Inserted company";
    }
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