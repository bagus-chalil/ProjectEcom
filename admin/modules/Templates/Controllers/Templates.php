<?php

/**
 * This is Admin Module Controller
 */

namespace Modules\Templates\Controllers;

use App\Controllers\BaseController;

class Templates extends BaseController 
{
  public function index()
  {
    $data=[
      'title'=>'Home',
      'isi'=>'v_home',
    ];
    echo view("\Modules\Templates\Views\layout\Header");
    echo view("\Modules\Templates\Views\layout\Topbar");
    echo view("\Modules\Templates\Views\layout\Sidebar");
    echo view("\Modules\Templates\Views\Templates");
    echo view("\Modules\Templates\Views\layout\Footer");
  }
}

 

