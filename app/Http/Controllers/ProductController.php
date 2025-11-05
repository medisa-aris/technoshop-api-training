<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $page = (int) $request->query('page', 1);
        $row  = (int) $request->query('row', 10);

        $query = Product::query();

        $total = $query->count();
        $products = $query
            ->offset(($page - 1) * $row)
            ->limit($row)
            ->get();

        return response()->json([
            'page' => $page,
            'row' => $row,
            'total' => $total,
            'data' => $products
        ]);
    }
}
