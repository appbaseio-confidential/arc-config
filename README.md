# Arc: Config setup

## Install Apache

<https://getgrav.org/blog/macos-catalina-apache-multiple-php-versions>

Follow the below sections from the above blog:

- Apache Installation
- Apache Configuration
- PHP Installation

## Configure (mandatory)

You can create `env.sample` at the root of your project with the following content or if you have any:

```dotenv
USERNAME=admin
PASSWORD=admin
ES_CLUSTER_URL=https://search-arc-tester-f6qku5j7i5lnqogzbibj336mgy.us-east-1.es.amazonaws.com/
APPBASE_ID=dc06761f-e3a5-4361-8287-c6afdd3f927a
```

Now in `util.php` change the `$filePath` to `./env.sample`.

> Make sure not to commit this change

## Starting services

After following above guide, make sure the services are started. In case not, try below commands. Make sure no process is running on port `8080`.
To kill all process on `8080`, run this command:

```shell script
kill -9 $(lsof -t -i:8080)
```

### Starting httpd

```shell script
brew services start httpd
```

### Starting apache server

```shell script
sudo apachectl -k restart
```

Once the above steps are done, you will have your server running at <http://localhost:8080>

## Configuring for arc-dashboard

If you are running Cluster locally, then you need to configure the `credentials` and `Elasticsearch URL`.

First make sure to allow `insecure-host` in browser:

- Chrome - chrome://flags/#allow-insecure-localhost
- Brave - brave://flags/#allow-insecure-localhost

Now go to <https://localhost> and enter your `Elasticsearch URL` and `ARC ID`. If you don't have one you can try this:

- Elasticsearch URL: <https://search-arc-tester-f6qku5j7i5lnqogzbibj336mgy.us-east-1.es.amazonaws.com/>
- ARC ID: dc06761f-e3a5-4361-8287-c6afdd3f927a

Now head over to [arc-dashboard](https://arc-dashboard.appbase.io/?url=http://localhost:8080) and enter your credentials as configured in the above step. Default is `admin:admin`.
