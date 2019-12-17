<?php

include_once 'queriesGeneral.php';
include_once 'queriesAgent.php';
include_once 'queriesBuilding.php';
include_once 'queriesCompanies.php';

if (isset($_POST['insert_submitCompany'])) {
    insertCompany();
    showAllCompanies();
    header("Location: ../companies.php?insert=success");
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
    header("Location: ../companies.php?update=success");
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
    delete('companies');
    showAllCompanies();
    header("Location: ../companies.php?delete=success");
}

if (isset($_POST['delete_submitBuilding'])) {
    delete('buildings');
    showAllBuildings();
    header("Location: ../buildings.php?delete=success");
}

if (isset($_POST['delete_submitAgent'])) {
    delete('agents');
    showAllAgents();
    header("Location: ../agents.php?delete=success");
}

if (isset($_POST['select_company'])) {
    showAllAgents();
    showAgentsWithCompaniesAndName('');
    header("Location: ../index.php?select=success");
}
