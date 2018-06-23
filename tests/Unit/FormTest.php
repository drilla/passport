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
     * @dataProvider fillDataProvider
     */
    public function testFill(array $formData) {

        $form = new App\Form\Simple();

        $form->fill($formData);

        $form->save();

        $this->assertFileExists($form->getSaveFilePath());

        echo (PHP_EOL . 'Создан: ' . $form->getSaveFilePath() . PHP_EOL);
    }

    public function fillDataProvider() : array {
        return [
            [['PGSNumber' => '09-19',
                'IDSeries' => '2805',
                'IDNumber' => '222444',]],
            [['PGSNumber' => '09-20',
                'IDSeries' => '28 05',
                'IDNumber' => '222 333',]],
        ];
    }
}
