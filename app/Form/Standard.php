<?php

namespace App\Form;

use App\Http\Requests\StandardForm;
use mikehaertl\pdftk\Pdf;

class Standard
{
    /** @var [] */
    private $_rusPassportSeries;
    private $_rusPassportNumber;

    private const TEMPLATE = 'standard.pdf';

    /** @var Pdf */
    private $_pdf;


    public function __construct() {
        $this->_pdf = new Pdf(app_path('/Form/Template/' . self::TEMPLATE));
    }

    /**
     * @throw new Exception
     */
    public function fill(array $formData) : void {
        $this->checkFormData($formData);

        $this->_pdf
            ->needAppearances()
            ->fillForm($formData)
            ->dropXfa()
        ;

    }

    public function save() {
        $this->_pdf->saveAs($this->getSaveFilePath());
    }

    public function getSaveFilePath() : string {
        return storage_path('app/form/' . $this->_generateName(). '.pdf');
    }

    private function _generateName() : string {
        return self::cutSpaces($this->_rusPassportSeries . $this->_rusPassportNumber);
    }

    private static function cutSpaces(string $text) : string {
        return str_replace(' ', '', $text);
    }

    private function checkFormData(array $formData) {
        if (isset($formData[StandardForm::P_ID_SERIES])) {
            $this->_rusPassportSeries = $formData[StandardForm::P_ID_SERIES];
        } else {
            throw new \InvalidArgumentException('Необходимо указать серию паспорта РФ');
        }

        if (isset($formData[StandardForm::P_ID_NUMBER])) {
            $this->_rusPassportNumber = $formData[StandardForm::P_ID_NUMBER];
        } else {
            throw new \InvalidArgumentException('Необходимо указать номер паспорта РФ');
        }

    }
}