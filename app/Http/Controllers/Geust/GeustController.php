<?php
namespace App\Http\Controllers\Geust;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class GeustController extends Controller{

public function guest(){
    return View('Geust.Page');
}
}