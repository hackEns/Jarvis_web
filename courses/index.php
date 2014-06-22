<?php
    require('../config.php');
    date_default_timezone_set($GLOBALS["timezone"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $GLOBALS["title"];?> - Courses</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <h1><?php echo $GLOBALS["title"];?> - Courses</h1>
        <?php
            $bdd = new PDO("mysql:host=".$GLOBALS["mysql_host"].";dbname=".$GLOBALS["mysql_db"], $GLOBALS["mysql_login"], $GLOBALS["mysql_pass"]);
            $bdd->query("SET NAMES utf8");

            $query = $bdd->query("SELECT id, item, author, comment, date, bought FROM courses ORDER BY date DESC");
            $results = $query->fetchAll();
        ?>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Commentaire</th>
                    <th>Proposé par</th>
                    <th>Date</th>
                    <th>Acheté</th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach($results as $result) {
                $date = new DateTime($result["date"]);
        ?>
                <tr <?php echo (($result["bought"] == 1) ? "class=\"disabled\"" : "");?>>
                    <td><?php echo htmlspecialchars($result["item"]);?></td>
                    <td><?php echo htmlspecialchars($result["comment"]);?></td>
                    <td><?php echo htmlspecialchars($result["author"]);?></td>
                    <td><?php echo $date->format("d/m/Y");?></td>
                    <td><?php echo (($result["bought"] == 1) ? "Oui" : "Non");?></td>
                </tr>
        <?php
            }
        ?>
                </tbody>
            </table>
    </body>
</html>
