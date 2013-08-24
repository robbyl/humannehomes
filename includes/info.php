<?php

session_start();

if (!empty($_SESSION['message-outer'])) {

    echo '<div class="message-outer">';
    echo $_SESSION['message-outer'];
    echo '</div>';

    unset($_SESSION['message-outer']);
}

if (!empty($_SESSION['error-outer'])) {

    echo '<div class="error-outer">';
    echo $_SESSION['error-outer'];
    echo '</div>';

    unset($_SESSION['error-outer']);
}

if (!empty($_SESSION['message'])) {

    echo '<div class="message">';
    echo $_SESSION['message'];
    echo '</div>';

    unset($_SESSION['message']);
}

if (!empty($_SESSION['error'])) {

    echo '<div class="error">';
    echo $_SESSION['error'];
    echo '</div>';

    unset($_SESSION['error']);
}

if (!empty($_SESSION['note1'])) {

    echo '<div class="note1">';
    echo '<a href="#" class="close close1">&nbsp;</a>';
    echo '<p >' . $_SESSION["note1"] . '</p>';
    echo '</div>';

    unset($_SESSION['note1']);
}

if (!empty($_SESSION['note2'])) {

    echo '<div class="note2">';
    echo '<a href="#" class="close close1">&nbsp;</a>';
    echo '<p >' . $_SESSION["note2"] . '</p>';
    echo '</div>';

    unset($_SESSION['note2']);
}

session_commit();
?>