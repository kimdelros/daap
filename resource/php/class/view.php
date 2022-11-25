<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
require_once 'config.php';

class view extends config{

        public function collegeSP2(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `collegeschool`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->college_school.'." value="'.$row->college_school.'">'.$row->college_school.'</option>';
                  echo 'success';
                }
        }

        public function course(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_course`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->course.'." value="'.$row->course.'">'.$row->course.'</option>';
                  echo 'success';
                }
        }

        public function campus(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_campus`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->campus.'." value="'.$row->campus.'">'.$row->campus.'</option>';
                  echo 'success';
                }
        }

        public function yearLevel() {
            echo '<option data-tokens="1st Year" value="1st Year">1st Year</option>';
            echo '<option data-tokens="2nd Year" value="2nd Year">2nd Year</option>';
            echo '<option data-tokens="3rd Year" value="3rd Year">3rd Year</option>';
            echo '<option data-tokens="4th Year" value="4th Year">4th Year</option>';
        }

        public function years() {
            for ($i = 1940; $i <= date('Y'); $i++) 
           echo '<option data-tokens=".'.$i.'." value="'.$i.'">'.$i.'</option>';
          }

        public function getdpSRA(){
            $user = new user();
            return $user->data()->dp;
        }

        public function getMmSRA(){
            $user = new user();
             return $user->data()->mm;
        }

}
