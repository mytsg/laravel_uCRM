<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Services\AnalysisService;
use App\Services\DecileService;

class AnalysisController extends Controller
{
    public function index(Request $request){
        $subQuery = Order::betweenDate($request->startDate, $request->endDate);

        if($request->type === 'perDay'){
            list($data, $labels, $totals) = Analysisservice::perDay($subQuery); 
            //list()により配列と同様の形式で複数の変数に値の代入を行う
        }
        if($request->type === 'perMonth'){
            list($data, $labels, $totals) = Analysisservice::perMonth($subQuery); 
            //list()により配列と同様の形式で複数の変数に値の代入を行う
        }
        if($request->type === 'perYear'){
            list($data, $labels, $totals) = Analysisservice::perYear($subQuery); 
            //list()により配列と同様の形式で複数の変数に値の代入を行う
        }

        if($request->type === 'decile'){
            list($data, $labels, $totals) = DecileService::decile($subQuery);
        }

        return response()->json([
            'data' => $data,
            'type' => $request->type,
            'labels' => $labels,
            'totals' => $totals,
        ], Response::HTTP_OK);
    }
}
