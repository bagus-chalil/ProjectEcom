<?php

/**
 * This is Admin Module Controller
 */

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController 
{
    public function index() {
        // echo "This is simple from Student Module";

        $data = [ "name" => "EventTech", "email" => "EventTech@gmail.com" ];

		echo view("\Modules\Templates\Views\layout\Header");
		echo view("\Modules\Templates\Views\layout\Topbar");
		echo view("\Modules\Templates\Views\layout\Sidebar");
		echo view("\Modules\Admin\Views\Admin", $data);
		echo view("\Modules\Templates\Views\layout\Footer");
	}
    public function otherMethod()
	{
		echo "This is other method from Student Module";
	}
}