# stats4e-Trace
Web archive for Solar e-Tracer 6415N photovoltaic charge manager
<a href="http://www.epsolarpv.com/en/index.php/Product/pro_content/id/598/am_id/136">product page<br>
<img src="http://www.epsolarpv.com/en/uploads/news/201411/1415684408765117.jpg"></a>

Demo page: https://bika.idokep.hu/~andrew/solar/index.php
# Features
- periodically download realtime data from the charge manager, and store it in mysql database
- draw zoomable graphs in a web page inlcuding
- Batt.Voltage(V)
- PV Voltage(V)
- Batt.Current(A)
- Charge Power(W)
- Remote Sensor Temp.(oC)
- Energy Gen.(kWh)
- Local Sensor Temp.(oC)
- Max.Batt.Voltage(V)
- Min.Batt.Voltage(V)

# INSTALLING
- git clone https://github.com/kissandr/stats4e-Tracer
- make stats4e-Tracer directory accessible by web server (apache or nginx)
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
- crontab for only one request per hour (maybe fixes firmware bug)
```
1 * * * * php cronLogData.php
```
- check if cron.php run without problems, and pushing data to database correctly

# Known issues
- due to firmware bug, the charge manager's web interface goes down after an amount of time or request number

