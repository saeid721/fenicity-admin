<?php
namespace App\Models; use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
class ExternalLink extends Model { public function category(){return $this->belongsTo(Category::class);} protected $fillable=['category_id','title','slug','url','description','image_url','open_mode','status','sort_order']; }
