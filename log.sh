touch /arc-data/.logs && chmod 777 /arc-data/.logs
> /arc-data/.logs

while true
do
    docker logs arc --tail 100 > /arc-data/.logs
    sleep 2s
done