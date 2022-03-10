#!/bin/sh

touch /reactivesearch-data/.env && chmod 777 -R /reactivesearch-data/

sleep 5s
### Set initial time of file
LTIME=`stat -c %Z /reactivesearch-data/.env`

while true    
do
   ATIME=`stat -c %Z /reactivesearch-data/.env`
   if [ "$ATIME" != "$LTIME" ]
   then
       echo "restarting rs-api container...."
       docker restart rs-api
       LTIME=$ATIME
   fi
   sleep 5
done
