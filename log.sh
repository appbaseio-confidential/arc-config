touch /arc-data/.logs && chmod 777 /arc-data/.logs
> /arc-data/.logs

while true
do
    echo "logging content....."
    docker logs arc >& /arc-data/.logs
    sleep 5
done
