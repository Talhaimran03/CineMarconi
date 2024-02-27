<div class="navbar-brand">
    <a href="index.php">
        <h1 class="navbar-heading">CineMarconi</h1>
    </a>
</div>
<div class="navbar-container">
    <nav class="navbar">
        <ul class="navbar-menu">
            <li><a href="index.php">Home</a></li>      
            <li><a href="contact-us.php">Contatti</a></li>
            <?php
            session_start();
            if (!isset($_SESSION['utente'])) {
                ?>
                <li><a href="login/login.php">Accedi</a></li>
                <?php
            } else {
                ?>
                <li><a href="login/profiloUtente.php">Profilo</a></li>
                <li><a href="login/logout.php">Esci</a></li>
                <?php
            }
            ?>
        </ul>
    </nav>
</div>