#!/bin/sh
#       change these parameters to fit your need

IN_LOCAL=loglevel.csv

#OUT_REMOTE="loglevel-"`date +%Y%m%d%H%M`".csv"
OUT_REMOTE=loglevel.csv

USER=xxxxxxxxxxx
PASSWD=xxxxxxxxxxxxx
SERVERIP=xxxxxxxxxx

/usr/bin/ftp -v -n $SERVERIP <<END_OF_SESSION
user $USER $PASSWD
lcd /var/www/level
prompt off
ascii
put $IN_LOCAL $OUT_REMOTE
bye
END_OF_SESSION

