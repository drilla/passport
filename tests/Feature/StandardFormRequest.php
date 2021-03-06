<?php

namespace Tests\Feature;

use App\Http\Requests\StandardForm;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class StandardFormRequest extends TestCase
{

    use WithoutMiddleware;
    /**
     *
     * @return void
     * @dataProvider saveProvider
     */
    public function testSave(array $postData, array $invalidKeys = []) {

        $response = $this->json('POST', '/save', $postData);

        if (!$invalidKeys) {
            /*
             * должен быть файл
             */
            $response->assertSuccessful();
            $response->assertHeader('Content-Type', 'application/pdf');
        } else {
            /**
             * ждем ответ с ошибками
             */

            $response->assertJsonValidationErrors($invalidKeys);
        }
    }

    public function saveProvider() {
        $correctDataSet = ['PGSNumber' => '09-19',
                           'LastName' => 'Иванов',
                           'FirstName' => 'Иван',
                           'Patronymic' => 'Иванович',
                           'BirthDate' => '31.01.1970',
                           'Birthplace' => 'Московская область г. Балашиха',
                           'Gender' => 'Male',

                           'ChangePersonData' => StandardForm::CHANGE_PD_YES,
                           'OldLastName' => 'Петрова',
                           'OldFirstName' => 'Елизавета',
                           'OldPatronymic' => 'Константиновна',
                           'OldGender' => StandardForm::OLD_GENDER_FEMALE,
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

                           'Residence' => StandardForm::RESIDENCE_ACTUAL,
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

                           'Phone' => '88003553535',
                           'Email' => '111122223333444455556666777788889999@mail.ru',
                           'IDSeries' => '2805',
                           'IDNumber' => '111111',
                           'IDIssueDate' => '22.02.2000',
                           'IDIssuer' => 'ОТДЕЛОМ УФМС ПО Г.МОСКВЕ ПО РАЙОНУ БАСМАННЫЙ',

                           'SecretAccess' => StandardForm::SECRET_ACCESS_YES,
                           'SAOrganization' => 'Федеральная служба безопасности Российской федерации',
                           'SAYear' => '2001',

                           'ContractObligations' => StandardForm::CONTRACT_OBLIGATIONS_YES,
                           'COOrganization' => '"ООО" РосОхуМикроКредит',
                           'COYear' => '2002',

                           'FPSeries' => '44',
                           'FPNumber' => '2456722',
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

        ];

        return [
            [$correctDataSet],
            [array_merge($correctDataSet,  ['BirthDate' => '32.01.1970',]), ['BirthDate']],
            [array_merge($correctDataSet,  [StandardForm::P_GENDER => 'wrong!',]), [StandardForm::P_GENDER]],
            [array_merge($correctDataSet,  [StandardForm::P_GENDER => StandardForm::GENDER_FEMALE,])],
        ];
    }


}
