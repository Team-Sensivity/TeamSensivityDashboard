<?php
$filename = basename(__FILE__, '.php');
if (str_contains($_SERVER['SCRIPT_FILENAME'], $filename)) {
    die("Permission denied!!");
}
/**
 * A complete login script with registration and members area.
 *
 * @author: Nils Reimers / http://www.php-einfach.de/experte/php-codebeispiele/loginscript/
 * @license: GNU GPLv3
 */
include_once("password.inc.php");

function getLatestGesamt($id)
{
    global $pdo;
    $min = 0;
    $stmt = $pdo->query("SELECT * FROM online ORDER BY firstDate DESC");
    while ($row = $stmt->fetch()) {
        if ($id == $row["discord_Id"]) {
            $min = $min + $row["minuten"];
        }
    }

    return $min;
}

function getLastMonth($id)
{
    global $pdo;
    $i = 0;
    $stmt = $pdo->query("SELECT * FROM online ORDER BY firstDate DESC");
    while ($row = $stmt->fetch()) {
        if ($id == $row["discord_Id"]) {
            $datum = explode("-", $row["firstDate"]);
            if ($datum[1] == date("m", strtotime("-1 month"))) {
                $i = $i + $row["minuten"];
            }
        }
    }

    return $i;
}

function getNowMonth($id)
{
    global $pdo;
    $i = 0;
    $stmt = $pdo->query("SELECT * FROM online ORDER BY firstDate DESC");
    while ($row = $stmt->fetch()) {
        if ($id == $row["discord_Id"]) {
            $datum = explode("-", $row["firstDate"]);
            if ($datum[1] == date("m", strtotime("now"))) {
                $i = $i + $row["minuten"];
            }
        }
    }

    return $i;
}

function getDayMinutes($id, $day)
{
    global $pdo;
    $i = 0;
    $stmt = $pdo->query("SELECT * FROM online ORDER BY firstDate DESC");
    while ($row = $stmt->fetch()) {
        if ($id == $row["discord_Id"]) {
            $datum = explode("-", $row["firstDate"]);
            if ($datum[1] == date("m", strtotime($day)) && substr($datum[2], 0, 2) == date("d", strtotime($day)) && $datum[0] == date("Y", strtotime($day))) {
                $i = $i + $row["minuten"];
            }
        }
    }

    return $i;
}

function getServerStatus($server)
{
    global $pdo;
    $use = array();
    $stmt = $pdo->query("SELECT * FROM server_infos");
    while ($row = $stmt->fetch()) {
        if ($server == $row["servername"]) {
            $use[0] = $row["start_status"];
            $use[1] = $row["neustart_status"];
            $use[2] = $row["stop_status"];
        }
    }

    return $use;
}

function getUsers($id)
{
    global $pdo;

    $use = array();
    $stmt = $pdo->query("SELECT * FROM users");
    while ($row = $stmt->fetch()) {
        if ($id == $row["id"]) {
            $use[0] = $row["discord_username"];
            $use[1] = $row["steam_id"];
        }
    }

    return $use;
}

function check_user()
{
    global $pdo;

    if (!isset($_SESSION['userid']) && isset($_COOKIE['identifier']) && isset($_COOKIE['securitytoken']) && !isset($_SESSION['discord_id'])) {
        $identifier = $_COOKIE['identifier'];
        $securitytoken = $_COOKIE['securitytoken'];

        $statement = $pdo->prepare("SELECT * FROM securitytokens WHERE identifier = ?");
        $result = $statement->execute(array($identifier));
        $securitytoken_row = $statement->fetch();

        if (sha1($securitytoken) !== $securitytoken_row['securitytoken']) {
            //Vermutlich wurde der Security Token gestohlen
            //Hier ggf. eine Warnung o.ä. anzeigen

        } else { //Token war korrekt
            //Setze neuen Token
            $neuer_securitytoken = random_string();
            $insert = $pdo->prepare("UPDATE securitytokens SET securitytoken = :securitytoken WHERE identifier = :identifier");
            $insert->execute(array('securitytoken' => sha1($neuer_securitytoken), 'identifier' => $identifier));
            setcookie("identifier", $identifier, time() + (3600 * 24 * 365)); //1 Jahr Gültigkeit
            setcookie("securitytoken", $neuer_securitytoken, time() + (3600 * 24 * 365)); //1 Jahr Gültigkeit

            //Logge den Benutzer ein
            $_SESSION['userid'] = $securitytoken_row['user_id'];
        }
    }


    if (!isset($_SESSION['userid']) && !isset($_SESSION['discord_id'])) {
        header("Location: /login.php");
    }


    if (!isset($_SESSION["discord_id"])) {
        $statement = $pdo->prepare("SELECT * FROM users WHERE id = :id");
        $result = $statement->execute(array('id' => $_SESSION['userid']));
        $user = $statement->fetch();
        return $user;
    } else {
        $statement = $pdo->prepare("SELECT * FROM users WHERE discord_id = :id");
        $result = $statement->execute(array('id' => $_SESSION['discord_id']));
        $user = $statement->fetch();
        return $user;
    }
}

/**
 * Returns true when the user is checked in, else false
 */
function is_checked_in()
{
    return isset($_SESSION['userid']);
}

function getConnections($discord_id){
 	global $pdo;
	$aData = array();

 	$stmt = $pdo->query("SELECT * FROM connections WHERE discord_id = '$discord_id'");
    	while ($row = $stmt->fetch()) {
		$aData[$row["type"]] = array("connect_id" => $row["connect_id"], "connect_name" => $row["connect_name"]);
	}

        return $aData;
}

/**
 * Returns a random string
 */
function random_string()
{
    if (function_exists('openssl_random_pseudo_bytes')) {
        $bytes = openssl_random_pseudo_bytes(16);
        $str = bin2hex($bytes);
    } else if (function_exists('mcrypt_create_iv')) {
        $bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
        $str = bin2hex($bytes);
    } else {
        //Replace your_secret_string with a string of your choice (>12 characters)
        $str = md5(uniqid('your_secret_string', true));
    }
    return $str;
}

/**
 * Returns the URL to the site without the script name
 */
function getSiteURL()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    return $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/';
}

/**
 * Outputs an error message and stops the further exectution of the script.
 */
function error($error_msg)
{
    include("templates/header.inc.php");
    include("templates/error.inc.php");
    include("templates/footer.inc.php");
    exit();
}
