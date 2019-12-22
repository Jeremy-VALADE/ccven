<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo site_url('Adherent'); ?>">
        <img src="<?php echo base_url(); ?>images/icone.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Accueil
    </a>    <button class=" bg-info  navbar-toggler btn-lg" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="text-primary collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav mr-0">
            <li class="nav-item">
                <a class="nav-link " href="<?php echo site_url('Adherent/connexion'); ?>">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?php echo site_url('Adherent/inscription'); ?>">Inscription</a>
            </li>
        </ul>    
    </div>    
</nav>
