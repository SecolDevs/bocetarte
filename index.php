<?php 

include_once($_SERVER['DOCUMENT_ROOT'] . '/bocetarte/path.php');

include_once(VIEW_PATH . 'includes/header.php');

include_once(VIEW_PATH . 'includes/menu.php');

if (isset($_GET['url'])) {
    $url = $_GET['url'];

    
}else {
    include_once('view/inicio.php');
}

include_once(VIEW_PATH . 'includes/footer.php');

?>