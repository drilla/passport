<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StandardFormRequest extends TestCase
{

    use WithoutMiddleware;
    /**
     *
     * @return void
     * @dataProvider saveProvider
     */
    public function testSave(array $postData, $isSuccess = true) {

        $response = $this->json('POST', '/save', $postData);

        if ($isSuccess) {
            /*
             * должен быть файл
             */
            $response->assertHeader('Content-Type', 'application/pdf');
        } else {
            /**
             * ждем ответ с ошибками
             */

            $response->assertJson([]);
        }
    }

    public function saveProvider() {
        return [
            [[], false]
        ];
    }
}
