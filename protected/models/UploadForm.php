<?php
class UploadForm extends CFormModel {
    public $archivo;
 
    public function rules() {
        return array(
			array('archivo', 'required'),
            array('archivo', 'file', 'types' => 'jpg, jpeg, png, html, mp4, m4v, mpeg, mpg, avi, ppt, pptx, doc, docx, xls, xlsx, pdf, pps, ppsx, txt, csv, rtf, wmv, mov, gif'),
        );
    }
}
?>