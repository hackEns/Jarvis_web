<?php
    require('../config.php');
    date_default_timezone_set($GLOBALS["timezone"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $GLOBALS["title"];?> - Emprunts</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <h1><?php echo $GLOBALS["title"];?> - Emprunts</h1>
        <?php
            $bdd = new PDO("mysql:host=".$GLOBALS["mysql_host"].";dbname=".$GLOBALS["mysql_db"], $GLOBALS["mysql_login"], $GLOBALS["mysql_pass"]);
            $bdd->query("SET NAMES utf8");

            $query = $bdd->query("SELECT id, borrower, tool, date_from, until, back FROM borrowings ORDER BY until DESC");
            $results = $query->fetchAll();
        ?>
        <table>
            <thead>
                <tr>
                    <th>Outil</th>
                    <th>Emprunté par</th>
                    <th>Depuis le</th>
                    <th>Retour prévu le</th>
                    <th>Rendu</th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach($results as $result) {
                $from = new DateTime($result["date_from"]);
                $until = new DateTime($result["until"]);
                $now = new DateTime();
                $interval = $until->diff($now)
        ?>
                <tr class="<?php echo (($result["back"] == 1) ? "disabled " : ""); echo (($interval->format("a") <= 1) ? "urgent" : "")?>">
                    <td><?php echo htmlspecialchars($result["tool"]);?></td>
                    <td><?php echo htmlspecialchars($result["borrower"]);?></td>
                    <td><?php echo $from->format("d/m/Y");?></td>
                    <td><?php echo $until->format("d/m/Y");?></td>
                    <td><?php echo (($result["back"] == 1) ? "Oui" : "Non");?></td>
                </tr>
        <?php
            }
        ?>
                </tbody>
            </table>
    </body>
</html>
