<?php

require_once('l18n.php');



echo l18n::get_language()."\n";
echo l18n::get_country();

echo __('form.comment', 'Your COMMENT');

?>