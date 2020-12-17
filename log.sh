touch /appbase-data/.logs && chmod 777 /appbase-data/.logs
> /appbase-data/.logs

while true
do
    echo "logging content....."
    docker logs appbase >& /appbase-data/.logs
    sleep 5
done
