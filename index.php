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

<!--<form action="includes/post.php" method="post">-->
<!--    <select type="text" name="select_company">-->
<!--        --><?php //getAllCompanies(); ?>
<!--    </select>-->
<!--    <input type="submit" name="submit_go" value="Go"/>-->
<!--</form>-->

<?php include "./footerIndex.html" ?>



