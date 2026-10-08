<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller; use App\Models\ContentItem; use App\Services\ApiResponse; use Illuminate\Http\Request;
class SearchController extends Controller { public function index(Request $request){$data=$request->validate(['q'=>['required','string','min:2','max:100']]);$items=ContentItem::where('status','published')->where(fn($q)=>$q->where('title','like','%'.$data['q'].'%')->orWhere('excerpt','like','%'.$data['q'].'%'))->latest('published_at')->paginate(20);return ApiResponse::ok($items->items(),'Search results retrieved successfully',['query'=>$data['q'],'current_page'=>$items->currentPage(),'total'=>$items->total()]);} }
