<div class="app-card">
    <div class="logo-container">
        <img src="./images/arc.svg" alt="logo"/>
    </div>
    <h2 class="centered-text">Login</h2>
    <p class="centered-text">Configure your Arc instance environment variables.</p>
    <form method="post" action="post-login.php" class="pure-form pure-form-stacked">
        <input class="pure-input-1" name="username" id="username" type="text" placeholder="Username" />
        <input class="pure-input-1" name="password" id="password" type="password" placeholder="Password" />
        <input type="hidden" value="login" />
        <button type="submit" class="pure-button pure-button-primary">Login</button>
    </form>
    <br />
</div>

<br />
<div class="app-banner app-info">
    <small><b>Forgot Password ?</b></small>
    <br/>
    <small>
        - Connect to your EC2 instance using <code>ssh</code>:
        <br />
        <code>
            ssh -i "test.pem" ec2-user@ec2-3-2-3-1.compute-1.amazonaws.com
        </code>
    </small>
    <br/><br/>
    <small>
        - Run following command to display your credentials:
        <br />
        <code>
            cat /etc/systemd/system/arc.env
        </code>
    </small>
</div>
