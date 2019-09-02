--------------------------------------------------------------------------
#Get and match countries and languages from https://restcountries.eu/
--------------------------------------------------------------------------

1. Goto project directory

2. Download project dependencies <br/>
composer install

3. Run script with CLI <br/>

case 1
------
php main.php spain
output :
Country language code: es
Spain speaks same language with these countries: Uruguay, Bolivia, Argentina..

case 2
-------
php main.php Spain Englang
output:
Spain and England do not speak the same language

case 3
------
php main.php Germany Austria
output:
Germany and Austria speak the same language: de

4. Run test cases <br/>
php vendor/phpunit/phpunit/phpunit
