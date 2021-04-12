<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidateController extends Controller
{
    public function checkSignIn(Request $request) {
        $request->validate([
            ''
        ])

    } 
