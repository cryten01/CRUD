<?php

function connectToDb()
{
    $conn_string = "host=localhost port=5432 dbname=realestate user=postgres password=1234";
    $dbConnection = pg_connect($conn_string) or die('Could not connect: ' . pg_last_error());
}

function showAgentsWithCompany()
{
    $query = "SELECT agents.forname, agents.surname, agents.turnover, companies.name
    FROM agents
    INNER JOIN companies ON agents.comp_id = companies.id";

    $result = pg_query($query) or die('Query failed: ' . pg_last_error());

    while ($value = pg_fetch_object($result)) {
        echo "<tr> <td>$value->forname <td>$value->surname <td>$value->turnover <td>$value->name";
    }
    pg_free_result($result);
}

function showAgentsWithCompaniesAndName($name)
{
    $query = "SELECT agents.forname, agents.surname, agents.turnover, companies.name
    FROM agents
    INNER JOIN companies ON agents.comp_id = companies.id
    WHERE companies.name = '$name';";

    $result = pg_query($query) or die('Query failed: ' . pg_last_error());

    while ($value = pg_fetch_object($result)) {
        echo "<tr> <td>$value->forname <td>$value->surname <td>$value->turnover <td>$value->name";
    }
    pg_free_result($result);
}

function getAllCompanies()
{
    $query = "SELECT name from companies ORDER BY id";
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());

    while ($value = pg_fetch_object($result)) {
        echo '<option>' . $value->name . '</option>';
    }

    pg_free_result($result);
}

function delete($tableName)
{
    $input_id = $_POST['delete_id'];
    $query_delete = "delete from $tableName where id = '$input_id';";
    $result = pg_query($query_delete) or die('Query failed: ' . pg_last_error());
}

connectToDb();


