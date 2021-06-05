<?php
if(isset($_REQUEST['confirm'])) {
    session_start();
    unset($_SESSION['logged']);
}
?>