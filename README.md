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
- check if your charge manager's datafeed is accessible through web browser, by visiting http://ip_address/RTMonitor?id=1
- set your charge manager's IP address in cron.php's $address variable
- set crontab for getting live data 
```
crontab -e*/5 * * * * php cron.php 
```
- check if cron.php run without problems, and pushing data to database correctly

