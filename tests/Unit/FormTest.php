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

        echo(PHP_EOL . 'Создан: ' . $form->getSaveFilePath() . PHP_EOL);
    }

    public function fillDataProvider(): array {
        return [
            [['PGSNumber' => '09-19',
                'LastName' => 'Иванов',
                'FirstName' => 'Иван',
                'Patronymic' => 'Иванович',
                'BirthDate' => '10.01.1970',
                'Birthplace' => 'Московская область г. Балашиха',
                'Gender' => 'Male',

                'ChangePersonData' => 1,
                'OldLastName' => 'Петрова',
                'OldFirstName' => 'Елизавета',
                'OldPatronymic' => 'Константиновна',
                'OldGender' => 'OldGenderFemale',
                'ChangeDate' => '11.01.2001',
                'ChangePlace' => 'Московская область г. Балашиха',
                'ChangeInfoNum' => '',

                'RegRegion' => 'Тверская область',
                'RegDistrict' => 'Конаковский район',
                'RegHomeTown' => 'Конаково',
                'RegStreet' => 'Ленина',
                'RegHouse' => '1',
                'RegHousing' => '12',
                'RegBuilding' => '2',
                'RegFlat' => '9993',
                'RegDate' => '10.02.2002',

                'Residence' => '', //TemporaryRegistered, Actual
                'ResRegion' => 'Тверская область',
                'ResDistrict' => 'Осташковский район',
                'ResHomeTown' => 'осцы',
                'ResStreet' => 'Главная',
                'ResHouse' => '12',
                'ResHousing' => '23',
                'ResBuilding' => '33',
                'ResFlat' => '1222',
                'ResRegDate' => '29.01.2003',
                'ResRegExp' => '29.01.2004',

                'Phone' => '1111222233334444',
                'Email' => '111122223333444455556666777788889999@mail.ru',
                'IDSeries' => '2805',
                'IDNumber' => '111111',
                'IDIssueDate' => '22.02.2000',
                'IDIssuer' => 'ОТДЕЛОМ УФМС ПО Г.МОСКВЕ ПО РАЙОНУ БАСМАННЫЙ',

                'SecretAccess' => 'SATrue', //SAFalse
                'SAOrganization' => 'Федеральная служба безопасности Российской федерации',
                'SAYear' => '2001',

                'ContractObligations' => 'COTrue', //COFalse
                'COOrganization' => '"ООО" РосОхуМикроКредит',
                'COYear' => '2002',

                'FPSeries' => '44',
                'FPNumber' => '24567',
                'FPIssueDate' => '13.12.2001',
                'FPIssuer' => 'УФМС РОССИИ ПО ТВЕРСКОЙ ОБЛАСТИ 617',

                'WorkPlace1' => 'Тверской государственный технический унивиеситет экономики и права в сфере массовых коммуникаций',
                'Address1' => 'Московская область г. тверь проспект ленина 25 к.1 стр.2 офис 312',
                'FromDate1' => '01.01.1980',
                'TillDate1' => '01.02.1999',

                'WorkPlace2' => 'Тверской государственный технический унивиеситет экономики и права в сфере массовых коммуникаций',
                'Address2' => 'Московская область г. тверь проспект ленина 25 к.1 стр.2 офис 312',
                'FromDate2' => '01.02.1999',
                'TillDate2' => 'Н. ВР.', //настоящее время

                'WorkPlace3' => '',
                'Address3' => '',
                'FromDate3' => '',
                'TillDate3' => '',
                'WorkPlace4' => '',
                'Address4' => '',
                'FromDate4' => '',
                'TillDate4' => '',
                'WorkPlace5' => '',
                'Address5' => '',
                'FromDate5' => '',
                'TillDate5' => '',
                'WorkPlace6' => '',
                'Address6' => '',
                'FromDate6' => '',
                'TillDate6' => '',
                'WorkPlace7' => '',
                'Address7' => '',
                'FromDate7' => '',
                'TillDate7' => '',
                'WorkPlace8' => '',
                'Address8' => '',
                'FromDate8' => '',
                'TillDate8' => '',
                'WorkPlace9' => '',
                'Address9' => '',
                'FromDate9' => '',
                'TillDate9' => '',

                'JobHistoryNum' => '',
                'FormDate' => '99.22.9999',

            ]],
        ];
    }
}
