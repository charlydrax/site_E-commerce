<?php
function membreAccess(){
    return (isset($_SESSION['member']) ? true : false);
}