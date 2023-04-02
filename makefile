include .env
export

mv-www:
	rm -R /var/www/petshop
	mkdir /var/www/petshop
	cp -r ./* /var/www/petshop

install-db:
	mysql -u $(DB_USERNAME) -p -e "DROP DATABASE $(DB_DATABASE); CREATE DATABASE $(DB_DATABASE);"
	mysql -u $(DB_USERNAME) -p $(DB_DATABASE) < _sql/petshoptay.sql