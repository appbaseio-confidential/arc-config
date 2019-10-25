<div class="app-card">
    <div class="logo-container">
        <img src="./images/arc.svg" alt="logo"/>
    </div>
    <h2 class="centered-text">Set credentials</h2>
    <p class="centered-text">Please set username and password for your arc service</p>
    <form method="post" action="credentials.php" class="pure-form pure-form-stacked">
        <input class="pure-input-1" name="username" id="username" type="text" placeholder="Username" value="<?=$username?>" />
        <input class="pure-input-1" name="password" id="password" type="password" placeholder="Password" value="<?=$password?>"/>
        <button type="submit" class="pure-button pure-button-primary">Continue</button>
    </form>
    <br />
</div>
