<?php

use controllers\MainController;

include_once ('./helpers/DBHelper.php');
require_once ('./controllers/MainController.php');

(new MainController())->getRecord();
