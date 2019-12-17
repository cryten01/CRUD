<?php
//phpinfo();

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

    echo '<select name="select_company">';

    while ($value = pg_fetch_object($result)) {
        echo '<option>' . $value->name . '</option>';
    }

    echo '</select>';
    pg_free_result($result);
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

function showAllBuildings()
{
    $query = "SELECT * from buildings ORDER BY id";
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());

    while ($value = pg_fetch_object($result)) {
        echo "<tr> <td>$value->id <td>$value->price <td>$value->address <td>$value->size <td>$value->status <td>$value->building_type";
    }
    pg_free_result($result);
}


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

function insertBuilding()
{
    $input_price = $_POST['insert_price'];
    $input_address = $_POST['insert_address'];
    $input_size = $_POST['insert_size'];
    $input_status = $_POST['insert_status'];
    $input_type = $_POST['insert_type'];

    $query_insert = "insert into buildings (price, address, size, status, building_type)
    values ('$input_price', '$input_address', '$input_size', '$input_status', '$input_type')";

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

function updateBuilding()
{
    $input_id = $_POST['update_id'];
    $input_price = $_POST['update_price'];
    $input_address = $_POST['update_address'];
    $input_size = $_POST['update_size'];
    $input_status = $_POST['update_status'];
    $input_type = $_POST['update_type'];

    $query_update = "update buildings set price = '$input_price', address = '$input_address', size = '$input_size', status = '$input_status', type = '$input_type' where id = '$input_id';";
    $query_insert = "insert into buildings (price, address, size, status, building_type)
    values ('$input_price', '$input_address', '$input_size', '$input_status', '$input_type')";

    if (pg_affected_rows(pg_query($query_update)) > 0) {
        echo "Updated building";
    } else {
        pg_query($query_insert);
        echo "Inserted building";
    }
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


function deleteCompany()
{
    $input_id = $_POST['delete_id'];
    $query_delete = "delete from companies where id = '$input_id';";
    $result = pg_query($query_delete) or die('Query failed: ' . pg_last_error());
}

function deleteBuilding()
{
    $input_id = $_POST['delete_id'];
    $query_delete = "delete from buildings where id = '$input_id';";
    $result = pg_query($query_delete) or die('Query failed: ' . pg_last_error());
}

function deleteAgent()
{
    $input_id = $_POST['delete_id'];
    $query_delete = "delete from agents where id = '$input_id';";
    $result = pg_query($query_delete) or die('Query failed: ' . pg_last_error());
}


connectToDb();


if (isset($_POST['insert_submitCompany'])) {
    insertCompany();
    showAllCompanies();
    header("Location: ../index.php?insert=success");
}

if (isset($_POST['insert_submitAgent'])) {
    insertAgent();
    showAllAgents();
    header("Location: ../agents.php?insert=success");
}

if (isset($_POST['insert_submitBuilding'])) {
    insertBuilding();
    showAllBuildings();
    header("Location: ../buildings.php?insert=success");
}


if (isset($_POST['update_submitCompany'])) {
    updateCompany();
    showAllCompanies();
    header("Location: ../index.php?update=success");
}

if (isset($_POST['update_submitAgent'])) {
    updateAgent();
    showAllAgents();
    header("Location: ../agents.php?update=success");
}

if (isset($_POST['update_submitBuilding'])) {
    updateBuilding();
    showAllBuildings();
    header("Location: ../buildings.php?update=success");
}


if (isset($_POST['delete_submitCompany'])) {
    deleteCompany();
    showAllCompanies();
    header("Location: ../index.php?delete=success");
}

if (isset($_POST['delete_submitBuilding'])) {
    deleteBuilding();
    showAllBuildings();
    header("Location: ../buildings.php?delete=success");
}

if (isset($_POST['delete_submitAgent'])) {
    deleteAgent();
    showAllAgents();
    header("Location: ../agents.php?delete=success");
}

if (isset($_POST['select_company'])) {
    showAllAgents();
    showAgentsWithCompaniesAndName('');
    header("Location: ../index.php?select=success");
}


