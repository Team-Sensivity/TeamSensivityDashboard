<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

if (isset($_POST["titel"]) && isset($_COOKIE["text"])) {
    $titel = $_POST["titel"];
    $datum = $_POST["datum"];
    $text = $_COOKIE["text"];
    $author = $user["id"];
    $banner_url = "";
    $tags = "s";

    foreach ($_POST['tags'] as $selectedOption) {
        if ($tags != "s") {
            $tags = $tags . "," . $selectedOption;
        } else {
            $tags = $selectedOption;
        }
    }

    $sql = "INSERT INTO news (titel, text, datum, tags, banner, author) VALUES ('$titel', '$text', '$datum', '$tags', '$banner_url', '$author')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    unset($_COOKIE['text']);
}
?>

<html lang="de">

<?php
include "templates/head.html";
?>
<link href="/assets/plugins/summernote/summernote-lite.min.css" rel="stylesheet">
<body>
<?php
include "templates/menu.php";
?>


</div>
<div class="app-container">
    <?php include "templates/app-header.php"; ?>
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>News Manager</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form class="row g-3" method="post">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Titel</label>
                            <input type="text" class="form-control" id="inputEmail4" name="titel" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Datum</label>
                            <input class="form-control" type="date" name="datum" placeholder="Select Date.."
                                   required>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Tags</label>
                            <select class="js-example-tokenizer js-states form-control" name="tags[]"
                                    multiple="multiple"
                                    tabindex="-1" style="display: none; width: 100%">
                                <optgroup label="Discord Tags">
                                    <?php
                                    $stmt = $pdo->query("SELECT * FROM news_tags");
                                    while ($row = $stmt->fetch()) {
                                        echo '<option value="' . $row["discord_id"] . '">' . $row["name"] . '</option>';
                                    }
                                    ?>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Banner</label>
                            <input type="file" class="form-control" name="banner" id="inputAddress2">
                        </div>
                        <div class="col">
                            <div id="summernote"><b>Hello </b>Summernote</div>
                        </div>
                </div>
                <div class="col-12">
                    <a onclick="save();" class="btn btn-success">Speichern</a>
                    <button type="submit" id="submit-button" class="btn btn-primary" disabled>Veröffentlichen</button>
                </div>
                </form>
            </div>
            <?php include "templates/footer.html"; ?>
        </div>
    </div>
</div>
</div>
<?php
include "templates/javascript.html";
?>
<script src="/assets/plugins/summernote/summernote-lite.min.js"></script>
<script>
    $(document).ready(function () {

        "use strict";
        $('#summernote').summernote({
            height: 400
        });
    });

    $(".js-example-tokenizer").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    });

    function save() {
        var html = $('#summernote').summernote('code');
        document.cookie = "text=" + html;
        document.getElementById("submit-button").disabled = false;
    }
</script>
</body>
</html>