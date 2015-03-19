# stats4e-Trace
Web archive for Solar e-Tracer 6415N photovoltaic charge manager

# INSTALLING
- git clone https://github.com/kissandr/stats4e-Trace
- make stats4e-Trace directory accessible by web server (apache or nginx)
- create database
```
mysqladmin create solar;
```
- create database schema
```
mysql -u root solar < db_schema.sql
```
- also create permissions to solar.* database
```
GRANT ALL PERMISIONS to solar.* to solar identified by 'mypassword12345';
```
- set your database passord in db.php
```
<?
$mysql=@mysql_pconnect("localhost","solar","mypassword12345");
...
```
- check if your charge manager's datafeed is accessible through web browser, by visiting http://ip_address/RTMonitor?id=1 output should be in the following format:
```
025.9:000.0:000.0:0000:000.0:026.0:000.0:Normal  :No Charge :053:0016.4:0018.6:
```
- set your charge manager's IP address in cron.php's $address variable
```
<?
$address = "http://ip_address";
...
```
- set crontab for getting live data 
```
crontab -e
*/5 * * * * php cron.php 
```
- check if cron.php run without problems, and pushing data to database correctly

