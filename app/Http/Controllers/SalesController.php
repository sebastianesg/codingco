<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use App\Models\ItemVenta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class SalesController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|string|email|max:255',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }
    
        DB::beginTransaction();
    
        try {
            $total_price = 0;
    
            // Create the sale
            $sale = Sale::create([
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
            ]);
    
            // Add items to the sale
            foreach ($request->products as $vproduct) {
                $product = Product::find($vproduct['id']);
    
                if (!$product) {
                    DB::rollBack();
                    return response()->json([
                        'success' => false,
                        'message' => 'Product ' . $vproduct['id'] . ' not found',
                    ]);
                }
    
                $quantity = $vproduct['quantity']?? 1;
                $price = $vproduct['price']?? $product->price;
    
                $item = ItemVenta::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);
    
                $total_price += $quantity * $price;
            }
            $sale->save();
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'sale_id' => $sale->id,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }    
    
}
