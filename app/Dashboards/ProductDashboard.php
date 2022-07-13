<?php

namespace App\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\DB;

class ProductDashboard extends Controller
{
    public function __construct()
    {
    }

    public function get_product_details(int $product_id): SupportCollection
    {
        return DB::table('products')
            ->join('sizes', 'products.size_id', "=", 'sizes.id')
            ->where('products.id', "=", $product_id)
            ->get();
    }
}
