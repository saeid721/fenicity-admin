<?php
namespace Tests\Feature;
use Tests\TestCase;
class ApiSmokeTest extends TestCase { public function test_home_endpoint_returns_envelope():void{$this->getJson('/api/v1/home')->assertOk()->assertJsonStructure(['success','message','data','meta']);} public function test_public_resource_is_paginated():void{$this->getJson('/api/v1/doctors')->assertOk()->assertJsonStructure(['success','data','meta']);}}
