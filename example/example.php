<?php
require_once('l18n.php'); #include the l18n class

l18n::set_lang('en_GB'); #set the language to English (Great Britain)

l18n::get_country(); #get the current country (OUTPUT: en)
l18n::get_language(); #get the current language (OUTPUT: GB)
l18n::get_langcode(); #get the current langcode (OUTPUT: en_GB)

__('form.name', 'Name'); #get's the translation for the key form.name (OUTPUT: Your name)
l18n::line('form.name', 'Name'); #equivalent to the example above
__('index.slogan', 'Sample Slogan') #get's the translation for the key index.slogan (OUTPUT: The good system for localization.)

__('abc.test', 'abc test')#get's the translation for the key abc.test. Cause abc.test has no translation the default text will be 
						  #given out and an log entry would be written. (OUTPUT: abc test)
?>