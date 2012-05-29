l18n.php - PHP Localization System
==========
l18n.php is a small (~2KB) PHP class which provide function for the easy localization of websites or webapps.  It uses .php files with arrays as language files and implements a buffer which reduce the HTTP requests. The language files are organised by sections which simplyfies the creation and maintenance.
The class dosen't have any dependencies and is released under the [X11/MIT license](https://github.com/reflic/l18n/blob/master/license).

Usage
-------
**Step 1**
Download `l18n.php` and include it in your system.
```php require_once('l18n.php');```

**Step 2**
Create your language directory. It should be something like `lang` or `language` etc.
Edit the path in 'l18n.php' on line 15, so l18n.php can find your language files.

Each language get's his own subdirectory. Example: `lang/en_GB/` is for English (Great Britain) or `lang/de_DE` is for Deutsch (Germany)

If you want to activate logging of missing language files, you must set the variable $log to true. (Line 18)
```php
private static $log = 'true';  
```

**Step 3**
Create the language files. l18n.php uses sections to organise the language files. Example: If you have a website, which has got an contact form an an homepage. You can make two sections: form and index. Each section becomes it's own .php file where the translation strings are stored. 
This action has the advantage that the site which holds the contact form only loads the language file for the form and not all. 

The language files should look like this:
(index.php)
```php 
<?php
return array(
	'title' => 'Title',
	'slogan' => 'The good system for localization.',
	'user' => 'User',
	'last_page' => 'Last Page',
	'no_rights' =>	'You have not the rights, that you need for visiting this page.'

	);
?>
```
As you can see, each string has his own key. You will need this key later when you get these translations.

**Step 4**

Now we will get our translations.
First we should set our current language with the `set_lang()` function. 
```php  l18n::set_lang('en_GB');```

Than we use the function `__($key, $default);` to get the translated strings, the first parameter is the key for our string. It is composed of two parts: `<section>.<key>`. The `<key>` is the key which we have defined in the language files.
The second parameter should contain the default string, which will be shown when the translation file is missing.
If you have activate logging of missing files (see Step 2), a .txt file will be created where you can find some infos regarding the missing language file.

Example:
```php

__('index.slogan', 'Sample Slogan'); //OUTPUT: The good system for localization.
```

The best thing to unterstand how it works, is to analyse the example directory.
If you habe any further question please contact me. (reflic[at]notesafe[dot]de)
Contributing
-----
If you have found any bugs or have ideas how to improve the class please create an issue or contact me: reflic[at]notesafe[dot]de


Credits
-------
Kevin B. [Fundstücke im Netz](www.fundstücke-im-netz.de)

License: X11/MIT see `LICENSE`

---
If you find any mistakes in this manual please contact me. English is not my first language. Thank you.