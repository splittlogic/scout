<?php

namespace splittlogic\scout\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use splittlogic\scout\scout;

class scoutController extends Controller
{


  public function index ()
  {

    $x = new scout;

    $content = 'Scout';

    return view('scout::blank',['content' => $content]);

  }


}
