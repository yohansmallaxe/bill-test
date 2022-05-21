<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BillResource;
use App\Http\Services\BillService;
use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $allBils = BillResource::collection(Bill::where('user_id', auth()->id())->get());

        return response()->json(['Bill info' => $allBils]);
    }

    public function edit(Bill $bill, Request $request, BillService $billService): \Illuminate\Http\JsonResponse
    {
        $price = $billService->calculateBill($request->units);

        $bill->bill = $price;
        $bill->units = $request->units;
        $bill->save();

        return response()->json(['used units' => $request->units, 'Bill' => $price]);
    }

    public function bill(Request $request, BillService $billService): \Illuminate\Http\JsonResponse
    {
        $price = $billService->calculateBill($request->units);

       // auth()->user()->bills()->create(['units' => $request->units, 'bill' => $price]);

        return response()->json(['used units' => $request->units, 'Bill' => $price]);
    }
}
