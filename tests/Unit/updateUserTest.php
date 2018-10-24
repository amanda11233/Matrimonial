<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
class updateUserTest extends TestCase
{

    use DatabaseMigrations;
    
    /**    
      @test
     
     */
public function updateUserTest(){
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

$users = User::where('id', 1)->update($data);

$this->addToAssertionCount(1);

}


    }
