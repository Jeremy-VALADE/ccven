<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo site_url('Adherent/accueil'); ?>">Accueil</a>
    <button class="navbar-toggler btn-lg" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Reservations/afficher'); ?>">Vos réservations</a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="<?php echo site_url('Reservations/formulaire'); ?>">Faire une réservation</a>
            </li>
        </ul>
        <ul class="navbar-nav mr-0">
            <li class="nav-item">
                <a class="nav-link " href="<?php echo site_url('Adherent/changePassword'); ?>">Changer votre mot de passe</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?php echo site_url('Adherent/deconnexion'); ?>">Déconnexion</a>
            </li>
        </ul>   
    </div>
</nav>

