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

        //var_dump($this->passedArgs[0]);
        //exit();

        $addr = $this->Zipcod->find('all', array(
          'conditions' => array('Zipcod.zipcode' => $this->passedArgs[0])
        ));
        //echo (json_encode($addr,JSON_UNESCAPED_UNICODE));
        echo (json_encode($addr));
        exit;
      }
    }
}
