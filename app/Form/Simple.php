<?php

namespace App\Form;


use mikehaertl\pdftk\Pdf;

class Simple
{
    /** @var [] */
    private $_formData;

    private $_rusPassportNumber;

    private const TEMPLATE = 'standard.pdf';


    public const P_ID_SERIES = 'IDSeries';

    /** @var Pdf */
    private $_pdf;

    public function __construct() {
        $this->_pdf = new Pdf(app_path() . '/Form/Template/' . self::TEMPLATE);
    }

    /**
     * @throw new Exception
     */
    public function fill(array $formData) : void {
        $this->_formData = $formData;

        if (!isset($formData[self::P_ID_SERIES])) {
            throw new \InvalidArgumentException('Необходимо указать номер паспорта РФ');
        }

        $this->_rusPassportNumber = $formData[self::P_ID_SERIES];

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
        return str_replace(' ', '', $this->_rusPassportNumber);
    }

}