<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo site_url('Adherent/accueil'); ?>">Accueil</a>

    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link " href="<?php echo site_url('Adherent/inscription'); ?>">Créer un utilisateur</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="<?php echo site_url('Administrateur/setUsers'); ?>">Modifier les utilisateurs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="<?php echo site_url('Administrateur/setReservations'); ?>">Modifier les réservations</a>
        </li>
    </ul>

    <ul class="navbar-nav mr-0">
        <li class="nav-item">
            <a class="nav-link " href="<?php echo site_url('Adherent/deconnexion'); ?>">Déconnexion</a>
        </li>
    </ul>        
</nav>
