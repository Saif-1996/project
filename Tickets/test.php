<?php
header('Content-Type: text/html; charset=utf-8');
$string = '"السلم عليكم"';
echo htmlspecialchars($string, ENT_NOQUOTES);
echo '<br>';
echo htmlentities($string);