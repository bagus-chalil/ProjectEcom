<?php

/**
 * Define Admin Routes
 */
// welcome page - URL: /student
$routes->get("admin", "\Modules\Admin\Controllers\Admin::index");
  
// other page - URL: /student/other-method
$routes->get("admin", "\Modules\Admin\Controllers\Admin::otherMethod");
?>