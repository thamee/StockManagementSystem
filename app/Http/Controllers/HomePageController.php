<?php
/**
 * Created by PhpStorm.
 * User: Malki
 * Date: 11/30/2017
 * Time: 1:59 PM
 */

namespace App\Http\Controllers;


class HomePageController extends Controller
{
    public function display()
    {
        return view('homepage');
    }
}