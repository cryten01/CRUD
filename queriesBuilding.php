<?php

function insertBuilding()
{
    $input_price = $_POST['insert_price'];
    $input_street = $_POST['insert_street'];
    $input_zipcode = $_POST['insert_zipcode'];
    $input_place = $_POST['insert_place'];
    $input_size = $_POST['insert_size'];
    $input_status = $_POST['insert_status'];
    $input_type = $_POST['insert_type'];

    $query_insert = "insert into buildings (price, street, zipcode, place, size, status, building_type)
    values ('$input_price', '$input_street', '$input_zipcode','$input_place', '$input_size', '$input_status', '$input_type')";

    $result = pg_query($query_insert) or die('Query failed: ' . pg_last_error());
}

function updateBuilding()
{
    $input_id = $_POST['update_id'];
    $input_price = $_POST['update_price'];
    $input_street = $_POST['update_street'];
    $input_zipcode = $_POST['upate_zipcode'];
    $input_place = $_POST['update_place'];
    $input_size = $_POST['update_size'];
    $input_status = $_POST['update_status'];
    $input_type = $_POST['update_type'];

    $query_update = "update buildings set 
        price = '$input_price', 
        street = '$input_street', 
        zipcode = '$input_zipcode', 
        place = '$input_place', 
        size = '$input_size', 
        status = '$input_status', 
        type = '$input_type'     
    where id = '$input_id';";
    $query_insert = "insert into buildings (price, street, zipcode, place, size, status, building_type)
    values ('$input_price', '$input_street', '$input_zipcode','$input_place', '$input_size', '$input_status', '$input_type')";

    if (pg_affected_rows(pg_query($query_update)) > 0) {
        echo "Updated building";
    } else {
        pg_query($query_insert);
        echo "Inserted building";
    }
}

function showAllBuildings()
{
    $query = "SELECT * from buildings ORDER BY id";
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());

    while ($value = pg_fetch_object($result)) {
        echo "<tr> 
              <td>$value->id 
              <td>$value->price 
              <td>$value->street 
              <td>$value->zipcode 
              <td>$value->place 
              <td>$value->size 
              <td>$value->status 
              <td>$value->building_type";
    }
    pg_free_result($result);
}