<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StandardForm extends FormRequest
{
    //заполняется при переходе из госуслуг - нам не нужно это
    const PSG_NUMBER = 'PGSNumber';

    /**
     * основная информация
     */
    const P_LAST_NAME   = 'LastName';
    const P_FIRST_NAME  = 'FirstName';
    const P_PATRONYMIC  = 'Patronymic';
    const P_BIRTH_DATE  = 'BirthDate';
    const P_BIRTH_PLACE = 'Birthplace';

    const P_GENDER      = 'Gender';
    const GENDER_MALE   = 'Male';
    const GENDER_FEMALE = 'Female';

    /**
     * Сведения о смене имени и пола
     */
    const P_CHANGE_PERSONAL_DATA = 'ChangePersonData';
    const CHANGE_PD_YES          = 'ChangePDTrue';
    const CHANGE_PD_NO           = 'ChangePDFalse';

    const P_OLD_LAST_NAME   = 'OldLastName';
    const P_OLD_FIRST_NAME  = 'OldFirstName';
    const P_OLD_PATRONYMIC  = 'OldPatronymic';
    const P_CHANGE_DATE     = 'ChangeDate';
    const P_CHANGE_PLACE    = 'ChangePlace';
    const P_CHANGE_INFO_NUM = 'ChangeInfoNum';

    const P_OLD_GENDER      = 'OldGender';
    const OLD_GENDER_MALE   = 'OldGenderMale';
    const OLD_GENDER_FEMALE = 'OldGenderFemale';

    /**
     * Сведения о регистрации
     */
    const P_REG_REGION   = 'RegRegion';
    const P_REG_DISTRICT = 'RegDistrict';
    const P_REG_HOMETOWN = 'RegHomeTown';
    const P_REG_STREET   = 'RegStreet';
    const P_REG_HOUSE    = 'RegHouse';
    const P_REG_HOUSING  = 'RegHousing';
    const P_REG_BUILDING = 'RegBuilding';
    const P_REG_FLAT     = 'RegFlat';
    const P_REG_DATE     = 'RegDate';

    /**
     * Сведения о текущем месте пребывания
     */
    const P_RESIDENCE         = 'Residence';
    const RESIDENCE_ACTUAL    = 'Actual';
    const RESIDENCE_TEMPORARY = 'TemporaryRegistered';

    const P_RES_REGION       = 'ResRegion';
    const P_RES_DISTRICT     = 'ResDistrict';
    const P_RES_HOMETOWN     = 'ResHomeTown';
    const P_RES_STREET       = 'ResStreet';
    const P_RES_HOUSE        = 'ResHouse';
    const P_RES_HOUSING      = 'ResHousing';
    const P_RES_BUILDING     = 'ResBuilding';
    const P_RES_FLAT         = 'ResFlat';
    const P_RES_REG_DATE     = 'ResRegDate';
    const P_RES_REG_DATE_EXP = 'ResRegExp';

    const P_PHONE            = 'Phone';
    const P_EMAIL            = 'Email';

    /**
     * Паспорт РФ
     */
    const P_ID_SERIES     = 'IDSeries';
    const P_ID_NUMBER     = 'IDNumber';
    const P_ID_ISSUE_DATE = 'IDIssueDate';
    const P_ID_ISSUER     = 'IDIssuer';

    /**
     * Был ли доступ к секретным сведениям
     */
    const P_SECRET_ACCESS   = 'SecretAccess';
    const SECRET_ACCESS_YES = 'SATrue';
    const SECRET_ACCESS_NO  = 'SAFalse';

    const P_SA_ORG        = 'SAOrganization';
    const P_SA_YEAR       = 'SAYear';

    /**
     * Есть ли долговые обязательства
     */
    const P_CONTRACT_OBLIGATIONS = 'ContractObligations';
    const CONTRACT_OBLIGATIONS_YES = 'COTrue';
    const CONTRACT_OBLIGATIONS_NO = 'COFalse';

    const P_CO_ORG               = 'COOrganization';
    const P_CO_YEAR              = 'COYear';

    /**
     * Предыдущий загран паспорт
     */
    const P_FP_SERIES     = 'FPSeries';
    const P_FP_NUMBER     = 'FPNumber';
    const P_FP_ISSUE_DATE = 'FPIssueDate';
    const P_FP_ISSUER     = 'FPIssuer';

    /**
     * Сведения о деятельности (9 шт как в форме)
     */

    const P_WORK_PLACE1 = 'WorkPlace1';
    const P_ADDRESS1    = 'Address1';
    const P_FROM_DATE1  = 'FromDate1';
    const P_TILL_DATE1  = 'TillDate1';

    const P_WORK_PLACE2 = 'WorkPlace2';
    const P_ADDRESS2    = 'Address2';
    const P_FROM_DATE2  = 'FromDate2';
    const P_TILL_DATE2  = 'TillDate2';

    const P_WORK_PLACE3 = 'WorkPlace3';
    const P_ADDRESS3    = 'Address3';
    const P_FROM_DATE3  = 'FromDate3';
    const P_TILL_DATE3  = 'TillDate3';

    const P_WORK_PLACE4 = 'WorkPlace4';
    const P_ADDRESS4    = 'Address4';
    const P_FROM_DATE4  = 'FromDate4';
    const P_TILL_DATE4  = 'TillDate4';

    const P_WORK_PLACE5 = 'WorkPlace5';
    const P_ADDRESS5    = 'Address5';
    const P_FROM_DATE5  = 'FromDate5';
    const P_TILL_DATE5  = 'TillDate5';

    const P_WORK_PLACE6 = 'WorkPlace6';
    const P_ADDRESS6    = 'Address6';
    const P_FROM_DATE6  = 'FromDate6';
    const P_TILL_DATE6  = 'TillDate6';

    const P_WORK_PLACE7 = 'WorkPlace7';
    const P_ADDRESS7    = 'Address7';
    const P_FROM_DATE7  = 'FromDate7';
    const P_TILL_DATE7  = 'TillDate7';

    const P_WORK_PLACE8 = 'WorkPlace8';
    const P_ADDRESS8    = 'Address8';
    const P_FROM_DATE8  = 'FromDate8';
    const P_TILL_DATE8  = 'TillDate8';

    const P_WORK_PLACE9 = 'WorkPlace9';
    const P_ADDRESS9    = 'Address9';
    const P_FROM_DATE9  = 'FromDate9';
    const P_TILL_DATE9  = 'TillDate9';

    /**
     * дополнения к сведениям о деятельности - количество листов
     */
    const P_JOB_HISTORY_NUM = 'JobHistoryNum';

    /**
     * Дата заполнения
     */
    const P_FROM_DATE = 'FormDate';

    const DATE_FORMAT = 'd.m.Y';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /*
         * не будем накладывать ограничений по влезанию в строку в документе. Это редкие кейсы. только разумные ограничения
         * 255 символов
         */

        $dateRule = 'max:10|date|date_format:' . self::DATE_FORMAT;

        return [
            self::P_FIRST_NAME  => 'required|max:255',
            self::P_LAST_NAME   => 'required|max:255',
            self::P_PATRONYMIC  => 'required|max:255',
            self::P_BIRTH_DATE  => 'required|' . $dateRule,
            self::P_BIRTH_PLACE => 'required|max:255',
            self::P_GENDER  => ['required',Rule::in([self::GENDER_MALE, self::GENDER_FEMALE])],

            self::P_CHANGE_PERSONAL_DATA => ['required', Rule::in([self::CHANGE_PD_YES, self::CHANGE_PD_NO])],
            self::P_OLD_LAST_NAME   => 'max:255',
            self::P_OLD_FIRST_NAME  => 'max:255',
            self::P_OLD_PATRONYMIC  => 'max:255',
            self::P_OLD_GENDER      =>  [Rule::in([self::OLD_GENDER_MALE, self::OLD_GENDER_FEMALE])],
            self::P_CHANGE_DATE     => $dateRule,
            self::P_CHANGE_PLACE    => 'max:255',
            self::P_CHANGE_INFO_NUM => 'max:1',

            self::P_REG_REGION   => 'required|max:255',
            self::P_REG_DISTRICT => 'required|max:255',
            self::P_REG_HOMETOWN => 'required|max:255',
            self::P_REG_STREET   => 'required|max:255',
            self::P_REG_HOUSE    => 'required|max:255',
            self::P_REG_HOUSING  => 'required|max:255',
            self::P_REG_BUILDING => 'required|max:255',
            self::P_REG_FLAT     => 'required|max:255',
            self::P_REG_DATE     => 'required|' . $dateRule




        ];
    }
}
