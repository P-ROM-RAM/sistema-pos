<?php

require_once "controllers/template.controller.php";
require_once "controllers/categories.controller.php";
require_once "controllers/customers.controller.php";
require_once "controllers/products.controller.php";
require_once "controllers/sales.controller.php";
require_once "controllers/users.controller.php";

// require_once "model/template.model.php";
require_once "model/categories.model.php";
require_once "model/customers.model.php";
require_once "model/products.model.php";
require_once "model/sales.model.php";
require_once "model/users.model.php";

$template = new TemplateController();
$template -> ctrTemplate();