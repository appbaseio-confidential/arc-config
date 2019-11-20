<style>
    .custom-restricted-width {
        width: 9em;
    }
</style>
<div class="pure-menu custom-restricted-width">
    <ul class="pure-menu-list">
        <li id="#env.php" class="pure-menu-item"><a href="./env.php" class="pure-menu-link">ENV</a></li>
        <li id="#logs.php" class="pure-menu-item"><a href="./logs.php" class="pure-menu-link">Logs</a></li>
    </ul>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var url = window.location.href.split('/');
        if (url[3]) {
            document.getElementById('#' + url[3]).className = "pure-menu-item pure-menu-selected"
        }
    })
</script>
