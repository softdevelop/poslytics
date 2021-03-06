<?php
class UserOnlinesController extends AppController {
   var $name = 'UserOnlines';
   public function beforeFilter() {
            parent::beforeFilter();
            //$this->Auth->allow('soluong', 'tong_so_truy_cap');
        }
   
   // Đếm số người đang online
   function soluong() {
      $soluong = $this->UserOnline->find('count');
      if (!empty($this->params['requested'])) {
         return $soluong;
      }
      else {
         $this->set(compact('soluong'));
      }
   }

   // Đếm số lượng khách truy cập
   function tong_so_truy_cap() {
      return $this->UserOnline->find('first', array('order' => array('UserOnline.id DESC')));
   }
}
?>