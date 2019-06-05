#!/bin/bash
clear

DB_HOST=$1
DB_USER=$2
DB_PASS=$3
DB_NAME=$4
DATA_DIR=$5

mysql --host=$DB_HOST --user=$DB_USER --password=$DB_PASS -e "DROP DATABASE IF EXISTS $DB_NAME;"
rm -rf ../moodata/$DATA_DIR;
