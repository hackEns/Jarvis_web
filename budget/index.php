<?php
    require('../config.php');
    date_default_timezone_set($GLOBALS["timezone"]);

    function scholar_year($date) {
        /* Returns the scholar year associated with date $date.*/
        $Y = $date->format('Y');
        if($date->format('m') > 8) {
            $year = $Y." / ".($Y - 1);
        }
        else {
            $year = ($Y - 1)." / ".$Y;
        }
        return $year;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $GLOBALS["title"];?> - Budget</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <h1><?php echo $GLOBALS["title"];?> - Budget</h1>
        <?php
            $bdd = new PDO("mysql:host=".$GLOBALS["mysql_host"].";dbname=".$GLOBALS["mysql_db"], $GLOBALS["mysql_login"], $GLOBALS["mysql_pass"]);
            $bdd->query("SET NAMES utf8");

            $query = $bdd->query("SELECT id, amount, author, date as date, comment FROM budget ORDER BY date DESC");
            $results = $query->fetchAll();


            // Compute total per year
            $total_per_year = array();
            foreach($results as $result) {
                $date = new DateTime($result["date"]);
                $scholar_year = scholar_year($date);
                if(!isset($total_per_year[$scholar_year])) {
                    $total_per_year[$scholar_year] = 0;
                }
                $total_per_year[$scholar_year] += floatval($result["amount"]);
            }

            $scholar_year = "";
            foreach($results as $result) {
                $date = new DateTime($result["date"]);
                $result_scholar_year = scholar_year($date);
                $amount = floatval($result['amount']);

                if($result_scholar_year != $scholar_year) {
                    $total = $total_per_year[$result_scholar_year];
                    if(!empty($scholar_year)) {
        ?>
                            </tbody>
                        </table>
        <?php
                    }
        ?>
                    <h2><?php echo $result_scholar_year; ?></h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Commentaire</th>
                                <th>Ajouté par</th>
                                <th>Crédit</th>
                                <th>Débit</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
        <?php
                }
        ?>
                            <tr>
                                <td><?php echo $date->format("d/m/Y");?></td>
                                <td><?php echo htmlspecialchars($result['comment']);?></td>
                                <td><?php echo htmlspecialchars($result['author']);?></td>
                                <td><?php echo (($amount > 0) ? $amount." €" : "-");?></td>
                                <td><?php echo (($amount < 0) ? $amount." €" : "-");?></td>
                                <td><?php echo $total." €";?></td>
                            </tr>
        <?php
                $scholar_year = $result_scholar_year;
                $total -= $amount;
            }
        ?>
    </body>
</html>
