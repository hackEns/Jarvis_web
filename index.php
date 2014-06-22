<?php
require_once('config.php');
require_once('rain.tpl.class.php');

if(!is_dir('tmp')) {
    mkdir('tmp');
}

raintpl::$tpl_dir = 'tpl/';
raintpl::$cache_dir = 'tmp/';
$tpl = new raintpl();

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

$bdd = new PDO("mysql:host=".$GLOBALS["mysql_host"].";dbname=".$GLOBALS["mysql_db"], $GLOBALS["mysql_login"], $GLOBALS["mysql_pass"]);
$bdd->query("SET NAMES utf8");

switch($_GET['do']) {
    case "budget":
        $query = $bdd->query("SELECT id, amount, author, date as date, comment FROM budget ORDER BY date DESC");
        $results = $query->fetchAll();

        $table = array(array("title"=>"", "class"=>"", "content"=>array("Date", "Commentaire", "Ajouté par", "Crédit", "Débit", "Total")));

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
        $count = 0;
        foreach($results as $result) {
            $count++;
            $date = new DateTime($result["date"]);
            $result_scholar_year = scholar_year($date);
            $amount = floatval($result['amount']);

            if($result_scholar_year != $scholar_year) {
                $total = $total_per_year[$result_scholar_year];
                $table[$count - 1]["title"] = $result_scholar_year;
            }

            $table[] = array("title"=> "", "class"=>"", "content"=>array($date->format("d/m/Y"), htmlspecialchars($result["comment"]), htmlspecialchars($result["author"]), (($amount > 0) ? $amount." €" : "-"), (($amount < 0) ? -$amount." €" : "-"), $total." €"));

            $scholar_year = $result_scholar_year;
            $total -= $amount;
        }
        $tpl->assign("title", $GLOBALS["title"]." - Budget");
        $tpl->assign("table", $table);
        break;

    case "courses":
        $query = $bdd->query("SELECT id, item, author, comment, date, bought FROM courses ORDER BY date DESC");
        $results = $query->fetchAll();

        $table = array(array("class"=>"", "content"=>array("Item", "Commentaire", "Proposé par", "Date", "Acheté")));
        foreach($results as $result) {
            $date = new DateTime($result["date"]);
            $table[] = array("class"=>($result["bought"] == 1) ? "disabled" : "", "content"=>array(htmlspecialchars($result["item"]), htmlspecialchars($result["comment"]), htmlspecialchars($result["author"]), $date->format("d/m/Y"), $result["bought"] == 1 ? "Oui" : "Non"));
        }
        $tpl->assign("title", $GLOBALS["title"]." - Courses");
        $tpl->assign("table", $table);
        break;

    case "emprunts":
        $query = $bdd->query("SELECT id, borrower, tool, date_from, until, back FROM borrowings ORDER BY until DESC");
        $results = $query->fetchAll();

        $table = array(array("class"=>"", "content"=>array("Outil", "Emprunté par", "Depuis le", "Retour prévu le", "Rendu")));
        foreach($results as $result) {
            $from = new DateTime($result["date_from"]);
            $until = new DateTime($result["until"]);
            $now = new DateTime();
            $interval = $until->diff($now);

            $table[] = array("class"=>(($result["back"] == 1) ? "disabled " : "").(($interval->format("a") <= 1) ? "urgent" : ""), "content"=>array(htmlspecialchars($result['tool']), htmlspecialchars($result['borrower']), $from->format("d/m/Y"), $until->format("d/m/Y"), (($result["back"] == 1) ? "Oui" : "Non")));
        }
        $tpl->assign("title", $GLOBALS["title"]." - Emprunts");
        $tpl->assign("table", $table);
        break;
}

$tpl->draw('index');
