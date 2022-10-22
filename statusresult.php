<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
?>

    <div class="title">
            Discount Application and Alumni Portal <br> Status Checker
         </div>
         <form>
            <?php 
                $transaction = new transaction($_POST['transactionID']);
                $transaction->statusCheck();
            ?> 
            <div class="field">
               <input type="submit" value="Back" href="status.php">
            </div>
         </form>
         
</body>

