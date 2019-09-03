<?php

echo "<h1 style='margin-below:10px;'>POST Variables</h1><br>";
foreach ( $_POST as $key => $value) {
echo "<p>$key - $value</p>";
echo "<hr />";
}

echo "<h1 style='margin-top:30px;margin-below:10px;'>GET Variables</h1>";
foreach ( $_GET as $key => $value) {
    echo "<p>$key - $value</p>";
    echo "<hr />";
}
