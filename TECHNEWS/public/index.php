<?php

# Chargement du Bootstrap
require_once 'bootstrap.php';

# Chargement du header
include_once PATH_HEADER;

# Contenu de mon site
require_once PATH_ROOT . '/Core/Core.php';
$core = new Core($_GET);

# Chargement du footer
include_once PATH_FOOTER;