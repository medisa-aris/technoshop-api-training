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

     /**
     * GET /productinsert?n=100
     * Inserts n random products into the database.
     */
    public function insert(Request $request)
    {
        $n = (int) $request->query('n', 10); // default 10 if not provided
        $inserted = 0;

        for ($i = 0; $i < $n; $i++) {
            Product::create([
                'title' => 'Sample Product ' . ($i + 1),
                'price' => rand(10, 200) + (rand(0, 99) / 100),
                'description' => 'Auto-generated product for testing or demo purposes.',
                'category' => ['men\'s clothing', 'women\'s clothing', 'electronics', 'jewelery'][array_rand([0,1,2,3])],
                'image' => 'https://picsum.photos/200/200?random=' . rand(1, 9999),
                'rating_rate' => rand(10, 50) / 10,
                'rating_count' => rand(1, 1000),
            ]);
            $inserted++;
        }

        return response()->json([
            'status' => 'success',
            'message' => "$inserted products inserted successfully.",
        ]);
    }
}
