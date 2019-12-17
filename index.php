<?php include "./header.html" ?>

<h2>Agents in company mcKnitel (One to many relation)</h2>

<table>
    <tr>
        <th>Forname</th>
        <th>Surname</th>
        <th>Turnover</th>
        <th>Name</th>
    <?php showAgentsWithCompany(); ?>
</table>

<?php include "./footer.html" ?>



