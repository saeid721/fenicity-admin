<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ContentItem extends Model { use SoftDeletes; protected $fillable=['type','title','slug','excerpt','body','status','created_by','updated_by','published_by','published_at','seo_meta_id','location_id']; protected $casts=['published_at'=>'datetime']; public function creator(){return $this->belongsTo(User::class,'created_by');} public function location(){return $this->belongsTo(Location::class);} public function seo(){return $this->belongsTo(SeoMeta::class,'seo_meta_id');} public function categories(){return $this->belongsToMany(Category::class,'content_categories','content_id','category_id');} public function contacts(){return $this->hasMany(ContactPoint::class,'content_id');} public function media(){return $this->belongsToMany(Media::class,'content_media','content_id','media_id')->withPivot(['role','sort_order']);}}
