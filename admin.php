<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateAdminTest extends DuskTestCase
{
    use withFaker;

    public $user_email , $user_password;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->user_email = $this->faker->email;
        $this->user_password = $this->faker->password;
        $this->browse(function ($browser) {
            /** @var Browser $browser */
            $browser->visit('http://calendar.test/admin/login')
                ->type('email', 'webmaster@viitech.net')
                ->type('password', '123abC--')
                ->press('Login')
                ->visit('admin/admin_user')
                ->visit('admin/admin_user/create')
                ->type('name', $this->faker->name)
                ->type('email', $this->user_email)
                ->type('password', $this->user_password)
                ->press('Save')
//                ->assertPathIs('/admin/admin_user')
//                ->visit('admin/dashboard')
//                ->visit('admin/logout')
//                ->type('email', $this->user_email)
//                ->type('password', $this->user_password)
//                ->press('Login')
//                ->assertPathIs('/admin/dashboard')
//                ->assertSee('Manage users')
//                ->visit('admin/logout')
;

        });
    }
    public function testCreateAdmin()
    {
        $this->testExample();
    }
}
