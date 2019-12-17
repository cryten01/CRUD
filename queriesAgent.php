<?php

function insertAgent()
{
    $input_forname = $_POST['insert_forname'];
    $input_surname = $_POST['insert_surname'];
    $input_street = $_POST['insert_street'];
    $input_zipcode = (int) $_POST['insert_zipcode'];
    $input_place = $_POST['insert_place'];
    $input_phone = $_POST['insert_phone'];
    $input_turnover = (int) $_POST['insert_turnover'];
    $input_comp_id = (int) $_POST['insert_comp_id'];

    $query_insert = "insert into agents (forname, surname, street, zipcode, place, phone_number, turnover, comp_id)
    values ('$input_forname', '$input_surname', '$input_street', '$input_zipcode','$input_place', '$input_phone', '$input_turnover', '$input_comp_id')";

    $result = pg_query($query_insert) or die('Query failed: ' . pg_last_error());
}

function updateAgent()
{
    $input_id = $_POST['update_id'];
    $input_forname = $_POST['update_forname'];
    $input_surname = $_POST['update_surname'];
    $input_street = $_POST['update_street'];
    $input_zipcode = (int) $_POST['update_zipcode'];
    $input_place = $_POST['update_place'];
    $input_phone = $_POST['update_phone'];
    $input_turnover = (int) $_POST['update_turnover'];
    $input_comp_id = (int) $_POST['update_comp_id'];

    $query_update = "update agents set 
        forname = '$input_forname', 
        surname = '$input_surname', 
        street = '$input_street',
        place = '$input_place',
        phone_number = '$input_phone',
        turnover = $input_turnover,
        zipcode = $input_zipcode,
        comp_id = $input_comp_id
    where id = '$input_id'";

    $query_insert = "insert into agents (forname, surname, street, zipcode, place, phone_number, turnover, comp_id)
    values ('$input_forname', '$input_surname', '$input_street', '$input_zipcode','$input_place', '$input_phone', $input_turnover', '$input_comp_id')";

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
        echo "<tr> 
              <td>$value->id 
              <td>$value->forname 
              <td>$value->surname 
              <td>$value->street 
              <td>$value->zipcode 
              <td>$value->place 
              <td>$value->phone_number 
              <td>$value->turnover
              <td>$value->comp_id";
    }
    pg_free_result($result);
}