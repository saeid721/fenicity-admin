<?php
namespace App\Services;
use Illuminate\Http\JsonResponse;
class ApiResponse { public static function ok(mixed $data=null,string $message='Success',array $meta=[]):JsonResponse{return response()->json(['success'=>true,'message'=>$message,'data'=>$data,'meta'=>$meta]);} public static function error(string $message,int $status=422,array $errors=[]):JsonResponse{return response()->json(['success'=>false,'message'=>$message,'errors'=>$errors],$status);} }
