<?php

require 'include/serveur.php';

app::getAuth()->logout();

session ::getInstance()->setFlash('sucess','vous etes maintenant déconnecté');

app::redirect('login.php');


