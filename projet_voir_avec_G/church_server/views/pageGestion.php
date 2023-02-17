<?php ob_start(); ?>



<?php
$content = ob_get_clean();
$title = "Page d'administration du site";
require "views/Template.php";

