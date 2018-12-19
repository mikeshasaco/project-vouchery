<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeLandingPageTest extends TestCase
{
    /** @test */
public function home_page_loads(){
    //Arrange

    //Act
    $response = $this->get('/');
    //Assert

    $response->assertStatus(200);
    $response->assertSee('Search Deals from Online Businesses');
    }

    /** @test */
public function productstest(){
    
}
}
