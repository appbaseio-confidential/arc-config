#!/bin/sh

touch /appbase-data/.env && chmod 777 -R /appbase-data/

sleep 5s
### Set initial time of file
LTIME=`stat -c %Z /appbase-data/.env`

while true    
do
   ATIME=`stat -c %Z /appbase-data/.env`
   if [ "$ATIME" != "$LTIME" ]
   then
       echo "restarting arc container...."
       docker restart arc
       LTIME=$ATIME
   fi
   sleep 5
done
