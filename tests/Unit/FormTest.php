<?php

namespace Tests\Unit;

use Tests\TestCase;
use App;

class FormTest extends TestCase
{
    /**
     * Заполняем стандартную форму данными,
     * проверяем визуально файлы, не косячат ли.
     *
     * @return void
     * @dataProvider fillProvider
     */
    public function testFill(array $formData) {

        $form = new App\Form\Simple();

        $form->fill($formData);

        $form->save();

        $this->assertFileExists($form->getSaveFilePath());

        echo ('Создан' . $form->getSaveFilePath() . PHP_EOL);
    }

    public function fillProvider() : array {
        return [
            [
                'PGSNumber' => "09-19",
                'IDSeries' => "2805222333",
            ], [
                'PGSNumber' => "09-20",
                'IDSeries' => "28 05 222 333",
            ]
        ];
    }
}
