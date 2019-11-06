<div class="app-card">
    <div class="logo-container">
        <img src="./images/arc.svg" alt="logo"/>
    </div>
    <h2 class="centered-text">Login to configure Arc environment</h2>
    <form method="post" action="post-login.php" class="pure-form pure-form-stacked">
        <label for="username">Username</label>
        <input required class="pure-input-1" name="username" id="username" type="text" placeholder="Username" />
        <label for="password">Password</label>
        <input required class="pure-input-1" name="password" id="password" type="password" placeholder="Password" />
        <button type="submit" class="pure-button pure-button-primary">Login</button>
    </form>
    <br />
</div>
<br/>
<div class="app-banner app-info">
    <small>
        Your Arc URL: <a id="app-url"></a>. Use this URL along with the username / password you have configured as Basic Auth credentials to access your ElasticSearch instance.
    </small>
    <br /> <br />
    <small>
        Visit <a id="app-dashboard-url">Arc Dashboard.</a> It lets you configure additional security rules, view analytics and provides a better development experience for your ElasticSearch.
    </small>
    <br/> <br />
    <small>
    <b>Note:</b> Until you have configured TLS for Arc, you will need to allow loading of unsafe scripts (<a href="https://i.imgur.com/G4eLUsa.png">example</a>) from your browser to connect to the Arc instance. We strongly recommend you to configure this.
    </small>
</div>
<br />
<div class="app-banner app-info">
    <small><b>Forgot Password ?</b></small>
    <br/>
    <small>
        - Exec into arc docker container:
        <br />
        <code>
            docker exec -it arc /bin/sh
        </code>
    </small>
    <br/><br/>
    <small>
        - Run following command to view your credentials:
        <br />
        <code>
            cat /arc-data/.env
        </code>
    </small>
</div>
