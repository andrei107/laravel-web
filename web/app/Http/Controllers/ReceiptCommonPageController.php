<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use App\Models\ReceiptModel;
use App\Models\MenuModel;
use App\Models\FilterTypes;
use App\Models\FilterValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ReceiptCommonPageController extends Controller
{
    public function index()
    {
        return view('pages.common-receipt-page', [
           'allReceipts' => ReceiptModel::all(),
           'menuItems'=> MenuModel::all(),
           'lang' => App::getLocale(),
           'dataTypes' => FilterTypes::all(),
           'dataValues' =>  FilterValue::all()
        ]);
    }
}
