<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class General
{

    var $ci;

    function __construct()
    {
        $this->ci = &get_instance();
        //        $this->isLogin();
    }

    function getSubSoalById($id) {
        $this->ci->load->model('survey_model');
        $subsoal = $this->ci->survey_model->getSubSoalById($id);
        return $subsoal;
    }

    function getJawabanSubSoalById($id) {
        $this->ci->load->model('survey_model');
        $subsoal = $this->ci->survey_model->getJawabanSubSoalById($id);
        return $subsoal;
    }
}
