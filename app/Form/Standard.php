<?php

namespace App\Form;

use mikehaertl\pdftk\Pdf;

class Standard
{
    /** @var [] */
    private $_rusPassportSeries;
    private $_rusPassportNumber;

    private const TEMPLATE = 'standard.pdf';

    const P_LAST_NAME  = 'LastName';
    const P_FIRST_NAME = 'FirstName';
    const P_PATRONYMIC = 'Patronymic';
    const P_BIRTH_DATE = 'BirthDate';
    const P_BIRTHPLACE = 'Birthplace';
    const P_GENDER     = 'Gender';

    const P_CHANGE_PERSONAL_DATA = 'ChangePersonData';

    const P_OLD_LAST_NAME   = 'OldLastName';
    const P_OLD_FIRST_NAME  = 'OldFirstName';
    const P_OLD_PATRONYMIC  = 'OldPatronymic';
    const P_OLD_GENDER      = 'OldGender';
    const P_CHANGE_DATE     = 'ChangeDate';
    const P_CHANGE_PLACE    = 'ChangePlace';
    const P_CHANGE_INFO_NUM = 'ChangeInfoNum';

    const P_REG_REGION   = 'RegRegion';
    const P_REG_DISTRICT = 'RegDistrict';
    const P_REG_HOMETOWN = 'RegHomeTown';
    const P_REG_STREET   = 'RegStreet';
    const P_REG_HOUSE    = 'RegHouse';
    const P_REG_HOUSING  = 'RegHousing';
    const P_REG_BUILDING = 'RegBuilding';
    const P_REG_FLAT     = 'RegFlat';
    const P_REG_DATE     = 'RegDate';

    const P_RESIDENCE        = 'Residence';
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

    const P_PHONE         = 'Phone';
    const P_EMAIL         = 'Email';
    const P_ID_SERIES     = 'IDSeries';
    const P_ID_NUMBER     = 'IDNumber';
    const P_ID_ISSUE_DATE = 'IDIssueDate';
    const P_ID_ISSUER     = 'IDIssuer';

    const P_SECRET_ACCESS = 'SecretAccess';
    const P_SA_ORG        = 'SAOrganization';
    const P_SA_YEAR       = 'SAYear';

    const P_CONTRACT_OBLIGATIONS = 'ContractObligations';
    const P_CO_ORG               = 'COOrganization';
    const P_CO_YEAR              = 'COYear';

    const P_FP_SERIES     = 'FPSeries';
    const P_FP_NUMBER     = 'FPNumber';
    const P_FP_ISSUE_DATE = 'FPIssueDate';
    const P_FP_ISSUER     = 'FPIssuer';

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

    const P_JOB_HISTORY_NUM = 'JobHistoryNum';
    const P_FROM_DATE       = 'FormDate';
    /** @var Pdf */
    private $_pdf;

    public function __construct() {
        $this->_pdf = new Pdf(app_path() . '/Form/Template/' . self::TEMPLATE);
    }

    /**
     * @throw new Exception
     */
    public function fill(array $formData) : void {
        $this->checkFormData($formData);

        $this->_pdf
            ->needAppearances()
            ->fillForm($formData)
        ;
    }

    public function save() {
        $this->_pdf->saveAs($this->getSaveFilePath());
    }

    public function getSaveFilePath() : string {
        return '/tmp/'. $this->_generateName() .'.pdf';
    }

    private function _generateName() : string {
        return self::cutSpaces($this->_rusPassportSeries . $this->_rusPassportNumber);
    }

    private static function cutSpaces(string $text) : string {
        return str_replace(' ', '', $text);
    }

    private function checkFormData(array $formData) {
        if (isset($formData[self::P_ID_SERIES])) {
            $this->_rusPassportSeries = $formData[self::P_ID_SERIES];
        } else {
            throw new \InvalidArgumentException('Необходимо указать серию паспорта РФ');
        }

        if (isset($formData[self::P_ID_NUMBER])) {
            $this->_rusPassportNumber = $formData[self::P_ID_NUMBER];
        } else {
            throw new \InvalidArgumentException('Необходимо указать номер паспорта РФ');
        }

    }
}