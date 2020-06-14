# Fake-Twitter-Web-Site
a web site create by php, bootstrap, mysql, jquery, ajax

database mysql
tables : users, twits


users Columns :
id -> primary key auto increment ,
username -> text,
email -> text,
password -> text

twits Columns :
id -> primary key auto increment,
user_id -> int forign key refrences id on users table,
title -> text,
body -> text
