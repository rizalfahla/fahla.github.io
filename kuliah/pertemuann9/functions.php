<?php
define('BASE_URL', '/pw2023_223040125/kuliah/pertemuann9/');

function checkActive($uri)
{
    return ($_SERVER["REQUEST_URI"] === BASE_URL . $uri) ? 'active' : '';
}
;

?>