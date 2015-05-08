#!/bin/sh
#       change these parameters to fit your need


USER=xxxxxxxxxxxx
PASSWD=xxxxxxxxxxx
SERVERIP=xxxxxxxxxxxxx

/usr/bin/ftp -v -n $SERVERIP <<END_OF_SESSION
user $USER $PASSWD
lcd /var/www/level
prompt off
ascii
put result.php
bye
END_OF_SESSION

