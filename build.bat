REM call vendor\bin\sami.php.bat update doc-config.php
REM call vendor\bin\pdepend.bat --summary-xml=docs\phpdepend\summary.xml --jdepend-chart=docs\phpdepend\jdepend.svg --overview-pyramid=docs\phpdepend\pyramid.svg app
REM echo Building HTML file
REM call doc\analytics\php\testBuilder.bat
REM echo Checking for messy PHP files
REM call vendor\bin\phpmd.bat app html codesize,controversial,design,naming,unusedcode --reportfile docs\phpmess\report.html
REM echo Checking for copy paste
REM call vendor\bin\phpcpd.bat app > docs\copypaste.txt
call vendor\bin\phpunit.bat --verbose --coverage-html docs\phpunit\coverage --testdox-html docs\phpunit\dox.html
pause