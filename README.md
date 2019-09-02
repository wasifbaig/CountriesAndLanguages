--------------------------------------------------------------------------
#Get and match countries and languages from https://restcountries.eu/
--------------------------------------------------------------------------

1. Goto project directory

2. Download project dependencies <br/>
composer install

3. Run script with CLI <br/>

case 1
------
php main.php spain <br/>
output : <br/>
Country language code: es  <br/> 
Spain speaks same language with these countries: Uruguay, Bolivia, Argentina..  <br/>

case 2
-------
php main.php Spain Englang <br/>
output: <br/>
Spain and England do not speak the same language <br/>

case 3
------
php main.php Germany Austria  <br/>
output:  <br/>
Germany and Austria speak the same language: de  <br/>

4. Run test cases <br/>
php vendor/phpunit/phpunit/phpunit
