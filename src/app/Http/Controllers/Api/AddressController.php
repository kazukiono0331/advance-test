<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function address($postcord)
    {
        $address = Address::where('postcord', intval($postcord))->first();
        return response()->json(
            $address,
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}