<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Location extends Model { protected $fillable=['address','area','thana','district','latitude','longitude','map_url']; protected $casts=['latitude'=>'float','longitude'=>'float']; }
