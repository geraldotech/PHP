@echo off
cd C:\Apps\php-8.3.12-nts-Win32-vs16-x64\crons
C:\Apps\php-8.3.12-nts-Win32-vs16-x64\php.exe runit.php
timeout /t 2 /nobreak >nul
exit