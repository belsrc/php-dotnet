REM call vendor\bin\sami.php.bat update doc-config.php
REM call vendor\bin\pdepend.bat --summary-xml=docs\phpdepend\summary.xml --jdepend-chart=docs\phpdepend\jdepend.svg --overview-pyramid=docs\phpdepend\pyramid.svg src
REM echo Checking for copy paste
REM call vendor\bin\phpcpd.bat src > docs\copypaste.txt
call vendor\bin\phpunit.bat --verbose --coverage-html docs\phpunit\coverage --testdox-html docs\phpunit\dox.html