<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
class addUserTest extends TestCase
{

    use DatabaseMigrations;
    
    /**    
      @test
     
     */
public function addUserTest(){
    $data = array(
        'account_for' => 'Myself',
        
        'name' => 'Admin',
        'age' => '20',
        'religion' => 'Hindu',
        'language' => 'Nepali',
        'gender' => 'Female',
        'phone' => '9808298928',
        'address' => 'Kathmandu',
        'email' => 'admin@gmail.com',
    
        'password' => 'admin123', 
    );

$users = User::create($data);

$this->addToAssertionCount(1);

}


    }
