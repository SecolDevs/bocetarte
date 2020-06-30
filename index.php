<?php 

include_once('path.php');

include_once(VIEW_PATH . 'includes/header.php');

require(VIEW_PATH . 'includes/menu.php');

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    include_once('view/'.$url.'.php');
}else {
    include_once('view/inicio.php');
}

include_once(VIEW_PATH . 'includes/footer.php');

?>