<?php
if (isset($_REQUEST["menu"])) {
    if ($_REQUEST["menu"] == "addgroup") {
        include("addgroup.php");
    } elseif ($_REQUEST["menu"] == "listgroup") {
        include("listgroup.php");
    }
} else {
    include("home.php");
}

?>