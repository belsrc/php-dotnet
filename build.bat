call vendor\bin\sami.php.bat update --force doc-config.php
call vendor\bin\pdepend.bat --summary-xml=docs\phpdepend\summary.xml --jdepend-chart=docs\phpdepend\jdepend.svg --overview-pyramid=docs\phpdepend\pyramid.svg src
echo Checking for copy paste
call vendor\bin\phpcpd.bat src > docs\copypaste.txt
call vendor\bin\phpunit.bat --verbose --coverage-html docs\phpunit\coverage --testdox-html docs\phpunit\dox.html