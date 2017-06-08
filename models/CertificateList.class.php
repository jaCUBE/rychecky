<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CertificateList
 *
 * @author jaCUBE
 */
class CertificateList {
    /**
   * @brief
   * @var Certificate $certificate_list
   */
  public $certificate_list = [];
  
  
  
  
  public function __construct(){
    $this->fetchCertificateList();
  }
    
  
  private function fetchCertificateList(){
    global $_DB;
    
    
    $sql = '
      SELECT c.*
      FROM certificate AS c
      WHERE c.visible = 1
      ORDER BY c.issue_date DESC';
    
    $STH = $_DB->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Certificate');
    $STH->execute();
    
    while($c = $STH->fetch()){ /* @var $certificate Certificate */
      $this->certificate_list[] = $c;
    }
  }
}
