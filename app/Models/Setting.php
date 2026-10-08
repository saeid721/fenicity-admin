<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Setting extends Model { protected $fillable=['key','value','type','is_public']; protected $casts=['is_public'=>'boolean']; public static function publicMap(): array { return self::where('is_public',true)->get()->mapWithKeys(fn($s)=>[$s->key=>match($s->type){'boolean'=>(bool)$s->value,'json'=>json_decode($s->value,true),'integer'=>(int)$s->value,default=>$s->value}])->all(); } }
