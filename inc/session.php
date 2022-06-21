<?php

// session_start(); amder session header ey akbar start chilo tai eita comment kore dichi
function errorMessage()
{
    if (isset($_SESSION['errorMessage'])) {
        $output = "<div class='alert alert-danger'>";
        $output .= htmlentities($_SESSION['errorMessage']);
        $output .= "</div>";
        $_SESSION['errorMessage'] = null;
        return $output;
    }
}
function successmessage()
{
    if (isset($_SESSION['successmessage'])) {
        $output = "<div class='alert alert-success'>";
        $output .= htmlentities($_SESSION['successmessage']);
        $output .= "</div>";
        $_SESSION['successmessage'] = null;
        return $output;
    }
}