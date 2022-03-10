touch /reactivesearch-data/.logs && chmod 777 /reactivesearch-data/.logs
> /reactivesearch-data/.logs

while true
do
    echo "logging content....."
    docker logs rs-api >& /reactivesearch-data/.logs
    sleep 5
done
