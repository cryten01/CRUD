<?php

include_once 'queriesGeneral.php';
include_once 'queriesAgent.php';
include_once 'queriesBuilding.php';
include_once 'queriesCompanies.php';


if (isset($_POST['insert_submitCompany'])) {
    insertCompany();
    showAllCompanies();
//    header("Location: companies.php?insert=success");
    echo("<script>location.href ='companies.php?insert=success'; </script>");
}

if (isset($_POST['update_submitCompany'])) {
    updateCompany();
    showAllCompanies();
//    header("Location: companies.php?update=success");
    echo("<script>location.href ='companies.php?update=success'; </script>");
}

if (isset($_POST['delete_submitCompany'])) {
    delete('companies');
    showAllCompanies();
//    header("Location: companies.php?delete=success");
    echo("<script>location.href ='companies.php?delete=success'; </script>");
}



if (isset($_POST['insert_submitAgent'])) {
    insertAgent();
    showAllAgents();
//    header("Location: agents.php?insert=success");
    echo("<script>location.href ='agents.php?insert=success'; </script>");
}

if (isset($_POST['update_submitAgent'])) {
    updateAgent();
    showAllAgents();
//    header("Location: agents.php?update=success");
    echo("<script>location.href ='agents.php?update=success'; </script>");
}

if (isset($_POST['delete_submitAgent'])) {
    delete('agents');
    showAllAgents();
//    header("Location: agents.php?delete=success");
    echo("<script>location.href ='agents.php?delete=success'; </script>");
}



if (isset($_POST['insert_submitBuilding'])) {
    insertBuilding();
    showAllBuildings();
//    header("Location: buildings.php?insert=success");
    echo("<script>location.href ='buildings.php?insert=success'; </script>");
}

if (isset($_POST['update_submitBuilding'])) {
    updateBuilding();
    showAllBuildings();
//    header("Location: buildings.php?update=success");
    echo("<script>location.href ='buildings.php?update=success'; </script>");
}

if (isset($_POST['delete_submitBuilding'])) {
    delete('buildings');
    showAllBuildings();
//    header("Location: buildings.php?delete=success");
    echo("<script>location.href ='buildings.php?delete=success'; </script>");
}



if (isset($_POST['select_company'])) {
        header("Location: index.php?select=success");
    showAgentsWithCompaniesAndName($_POST['select_company']);
}
