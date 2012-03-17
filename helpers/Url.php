<?php

function url($url, $title, $style = null)
{
    return '<a href="' . URL . $url . '" ' . $style . '>' . $title . '</a>';
}

?>
