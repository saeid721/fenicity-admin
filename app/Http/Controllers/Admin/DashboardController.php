<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; use App\Models\ContentItem; use App\Models\User; use App\Models\Category;
class DashboardController extends Controller { public function index(){return view('admin.dashboard',['stats'=>['users'=>User::count(),'contributors'=>User::whereHas('roles',fn($q)=>$q->where('slug','contributor'))->count(),'published'=>ContentItem::where('status','published')->count(),'pending'=>ContentItem::where('status','pending_review')->count(),'drafts'=>ContentItem::where('status','draft')->count(),'categories'=>Category::count()],'recent'=>ContentItem::latest()->limit(8)->get()]);}}
