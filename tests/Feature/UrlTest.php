<?php

namespace Tests\Feature;

use Tests\TestCase;

class UrlTest extends TestCase
{
    /**
     * Get request test for /encode.
     *
     * @return void
     */
    public function testEncodeGetRequest()
    {
        $response = $this->get('/encode');

        $response->assertStatus(200);
    }

    /**
     * Post request test for /encode.
     *
     * @return void
     */
    public function testEncodePostRequest()
    {
        $response = $this->json('POST', '/encode', ['link' => 'someLongLink']);
        $response
            ->assertStatus(201)
            ->assertCreated();
    }

    /**
     * Get request test for /decode.
     *
     * @return void
     */
    public function testDecodeGetRequest()
    {
        $response = $this->get('/decode');

        $response->assertStatus(200);
    }

    /**
     * Get request test for /decode/{slug}.
     *
     * @return void
     */
    public function testDecodeNonExistentSlugGetRequest()
    {
        $response = $this->get('/decode/slug', ['slug' => 'nonExistentCode']);
        $response->assertStatus(404);
    }

    /**
     * Get request test for /{slug}.
     *
     * @return void
     */
    public function testShortCodeInputGetRequest()
    {
        $response = $this->get('/slug', ['slug' => 'nonExistentCode']);
        $response->assertStatus(404);
    }
}
