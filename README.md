Requirments
===========
* PHP 5.3.2 or higher
* MySql with option "lower_case_table_names=1"
* ACE Admin version ace-v1.2--bs-v2.3.x or use free https://github.com/bopoda/ace

Installing
==========
* clone https://github.com/uldisn/d2app
* copy in cloned directory composer.phar (https://getcomposer.org/download/)
* create empty MySql database, user and password
* start installation: php composer.phar install
* if you have ACE ADMIN, copy it version ace-v1.2--bs-v2.3.x to /vendor/ace_admin/v_2_3 and in php file /vendor/uldisn/d2app/config/main.php unconment 561 and comment out 562 row
* directory www config as web root directory
* Open web apge. Default logon for admin: d2app_admin/carnikava
 