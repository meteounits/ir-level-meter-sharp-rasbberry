#!/bin/sh
#       change these parameters to fit your need

IN_LOCAL=/var/www/level/000099.txt
OUT_REMOTE="000099""`date +%Y%m%d%H%M`"".txt"
IN_LOCAL1=/var/www/level/000099.ist
OUT_REMOTE1=/Dati_Ist/"000099.ist"

USER=xxxxxxxxxx
PASSWD=xxxxxxxxxxxxx
SERVERIP=xxxxxxxxxxxxxxxx

/usr/bin/ftp -v -n $SERVERIP <<END_OF_SESSION
user $USER $PASSWD
lcd /
prompt off
ascii
put $IN_LOCAL $OUT_REMOTE
bye
END_OF_SESSION

if [ $? -eq 0 ] 
then
    rm $IN_LOCAL
fi

USER1=xxxxxxxxxxxxx
PASSWD1=xxxxxxxxxxxxxx
SERVERIP=xxxxxxxxxx

/usr/bin/ftp -v -n $SERVERIP <<END_OF_SESSION
user $USER1 $PASSWD1
lcd /
prompt off
ascii
put $IN_LOCAL1 $OUT_REMOTE1
bye