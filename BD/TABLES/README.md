To do a database backup 
mysqldump --databases Cp > Cp.sql
tar -czf Cp.sql.tar.gz

To restore this backup in your computer

Create the user corynDBUser

tar -xzf Cp.sql.tar.gz
mysql -u corynDBUser -p < Cp.sql
