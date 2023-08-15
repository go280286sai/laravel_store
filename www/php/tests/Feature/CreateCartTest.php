<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Order_product;
use App\Models\User;


use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class CreateCartTest extends TestCase
{

    public function test_create_cart()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $response->assertStatus(302);
        $this->assertAuthenticated();
        $response = $this->actingAs(Auth::user())
            ->withSession([
                'cart' => [['id' => 1, 'title' => 'title', 'slug' => 'slug', 'qty' => 10, 'price' => 100]],
                'delivery'=> ['service' => 2, 'address' => 'address', 'phone' => 'phone'],
                'order'=> ['total_count' => 10, 'total_sum' => 1000]
            ])
            ->post('/cart/create', ['payment'=>1]);
        $response->assertStatus(302);
}
}
