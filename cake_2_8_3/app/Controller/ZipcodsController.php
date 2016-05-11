<?php



class ZipcodsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $presetVars = true;


    public function index() {
        //echo $this->Zipcod->find('first');
        //var_dump($this->Zipcod->find('first')['Zipcod']);
        //exit;
    }
    public function zipsearch() {
      if($this->request->is('ajax')) {

        $addr = $this->Zipcod->find('all', array(
          'conditions' => array('Zipcod.zipcode' => $this->request->data['zipcode'])
        ));
        //echo (json_encode($addr,JSON_UNESCAPED_UNICODE));
        echo (json_encode($addr));
        exit;
      }
    }
    public function beforeFilter() {
        parent::beforeFilter();
        //ログインしないと郵便番号検索機能に繋がらないのを回避
        $this->Auth->allow('zipsearch');
    }
}
