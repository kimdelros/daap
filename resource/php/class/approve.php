<?php

class approve extends config{
    public $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function approveApplication(){
        $con = $this->con();
        $sql = "UPDATE `applications` SET `isApproved` = 1, `dateReviewed` = CURRENT_TIMESTAMP WHERE `appID` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        } else {
            return false;
        }
    }

}



?>