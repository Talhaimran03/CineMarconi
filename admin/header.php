<?php

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: ../scr/login/login.php');
}

?>
<div class="admin-section-header">
    <div class="admin-logo">
        CineMarconi
    </div>
    <div class="admin-login-info">
        <div style="padding: 0 20px;">
            <h2><a href="#">Admin</a></h2>
        </div>
        <form method='post' action="">
            <input type="submit" value="Logout" class="btn btn-outline-warning" name="logout">
        </form>
    </div>
</div>