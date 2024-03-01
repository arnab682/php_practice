<?php
namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;


class DemoController extends Controller
{
    public function DemoAction()
    {

       return Product::paginate(
           $perPage = 2,
           $columns = ['title', 'price'],
           $pageName = 'ItemNumber',
       );

    }
}
