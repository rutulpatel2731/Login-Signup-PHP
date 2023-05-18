<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") {
    $login = true;
} else {
    $login = false;
}
echo ' 
<nav class="navbar navbar-expand-lg navbar-light bg-light ms-auto">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">';


if (!$login) {
    echo '<li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>';
}

if ($login) {
    echo '
    <li class="nav-item">
    <a class="nav-link" href="welcome.php">Home</a>
</li>
    <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
    </li>

    <li class="nav-item">
                    <a class="nav-link" href="profile.php">Crud</a>
    </li>

    <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>';
}

echo      '</ul>
        </div>
    </div>
</nav>';
