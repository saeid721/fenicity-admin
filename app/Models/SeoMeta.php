<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SeoMeta extends Model { protected $fillable=['meta_title','meta_description','og_title','og_description','og_image_url','canonical_url','robots','json_ld']; protected $casts=['json_ld'=>'array']; }
