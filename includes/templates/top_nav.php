<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Ninth navbar example">
    <div class="container">
        <a class="navbar-brand" href="#">Hall Booking System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars-nav" aria-controls="navbars-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbars-nav">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $_config['base_url'] . 'client' ?>">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $_config['base_url'] . 'hall' ?>">Halls</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown-nav" data-bs-toggle="dropdown" aria-expanded="false">Booking</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown-nav">
                        <li><a class="dropdown-item" href="<?= $_config['base_url'] . 'booking/index.php' ?>">List</a></li>
                    </ul>
                </li>
            </ul>
            <a class="btn btn-success my-2 my-sm-0" href="<?= $_config['base_url'] . 'auth/logout.php' ?>">
                Logout [<?php echo $_COOKIE['username'] ?>]
            </a>
        </div>
    </div>
</nav>