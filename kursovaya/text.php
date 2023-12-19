<?php
session_start();
if ($_SESSION['idrolle'] == 2){
    echo "ты админ";
} else {
    echo "ты юсер(лох)";
}
