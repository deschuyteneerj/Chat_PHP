<?php //Routeur\\

    require('controller/controller.php');

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'login') {
            login();
        }
        else if ($_GET['action'] == 'subscribe'){
            subscribe();
        }
    }
    else {
        chat();
    }
?>