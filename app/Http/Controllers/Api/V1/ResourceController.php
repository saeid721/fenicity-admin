<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\ContentItem;
use App\Services\ApiResponse;
use Illuminate\Http\Request;
class ResourceController extends Controller {
    private array $map=['doctors'=>'doctor','hospitals'=>'hospital','diagnostic-centers'=>'diagnostic','hotels'=>'hotel','restaurants'=>'restaurant','shopping-centers'=>'shopping_center','service-providers'=>'service_provider','educational-institutes'=>'educational_institute','teachers'=>'teacher','entrepreneurs'=>'entrepreneur','parlours'=>'parlour','jobs'=>'job','news'=>'news','tourist-places'=>'tourist_place','gardens'=>'garden','videos'=>'video','events'=>'event','rental-properties'=>'rental_property','land'=>'land','vehicles'=>'vehicle','blood'=>'blood','bus'=>'bus_schedule','train'=>'train_schedule','emergency-services'=>'emergency_service','fire-services'=>'fire_service','courier-services'=>'courier_service','electricity-offices'=>'electricity_office','police-stations'=>'police_station','nursery'=>'nursery','services'=>'service_provider','notifications'=>'notification'];
    public function index(Request $request,string $resource){abort_unless(isset($this->map[$resource]),404); $q=ContentItem::query()->where('type',$this->map[$resource])->where('status','published')->with(['location','categories','media','contacts']); if($request->filled('q')){$term=$request->string('q');$q->where(fn($x)=>$x->where('title','like',"%$term%")->orWhere('body','like',"%$term%"));} $items=$q->orderByDesc('published_at')->paginate(min(max((int)$request->input('per_page',20),1),50)); return ApiResponse::ok($items->items(),'Content retrieved successfully',['current_page'=>$items->currentPage(),'per_page'=>$items->perPage(),'total'=>$items->total(),'last_page'=>$items->lastPage()]);}
    public function show(string $resource,string $slug){abort_unless(isset($this->map[$resource]),404);$item=ContentItem::where('type',$this->map[$resource])->where('slug',$slug)->where('status','published')->with(['location','categories','media','contacts'])->firstOrFail();return ApiResponse::ok($item,'Content retrieved successfully');}
}
