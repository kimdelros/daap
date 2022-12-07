<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';

class view extends config{

        public function collegeSP2(){
            $con = $this->con();
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
            $con = $this->con();
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
          echo '<option data-tokens="Malolos" value="Malolos">Malolos</option>';
          echo '<option data-tokens="Manila" value="Manila">Manila</option>';
          echo '<option data-tokens="Makati" value="Makati">Makati</option>';
          echo 'success';
        }

        public function yearLevel() {
            echo '<option data-tokens="1st Year" value="1st Year">1st Year</option>';
            echo '<option data-tokens="2nd Year" value="2nd Year">2nd Year</option>';
            echo '<option data-tokens="3rd Year" value="3rd Year">3rd Year</option>';
            echo '<option data-tokens="4th Year" value="4th Year">4th Year</option>';
            echo '<option data-tokens="5th Year" value="5th Year">5th Year</option>';
            echo '<option data-tokens="6th Year" value="6th Year">6th Year</option>';
            echo 'success';
        }

        public function years() {
            for ($i = date('Y'); $i >= 1925; $i--) 
           echo '<option data-tokens=".'.$i.'." value="'.$i.'">'.$i.'</option>';
           echo 'success';
          }

        public function getdpSRA(){
            $user = new user();
            return $user->data()->dp;
        }

        public function getMmSRA(){
            $user = new user();
             return $user->data()->mm;
        }

        public function countries(){
            $con = new config2();
            $db = $con->conn();
            $sql = "SELECT * FROM `tbl_countries` ORDER BY `countryname` ASC";
            $data = $db->prepare($sql);
            $data->execute();
            $rows = $data-> fetchAll();
            foreach ($rows as $row) {
              echo "<option data-tokens='$row[countryname]' value='$row[countryname]'> $row[countryname] </option>";
            }
        }

}
