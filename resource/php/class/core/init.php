<?php
date_default_timezone_set('Asia/Manila');
session_start();
$GLOBALS['config'] = array(
    'mysql'=>array(
        //localhost connection
        'host' => '127.0.0.1:3306',
        'username' =>'root',
        'password' =>'',
        'db'=>'daap'
    ),
    // 'mysql'=>array(
        //hostinger connection
    //     'host' => '109.106.251.63',
    //     'username' =>'port7396_daap',
    //     'password' =>'p@ssw0rdBSIT4A',
    //     'db'=>'port7396_daap'
    // ),  
    'remember'=>array(
        'cookie_name' => 'hash',
        'cookie_expiry' =>604800
    ),
    'session'=>array(
        'session_name' =>'user',
        'token_name' =>'token'
    )
);
$GLOBALS['config2'] = array(
    'mysql'=>array(
        //localhost connection
        'host' => '127.0.0.1:3306',
        'username' =>'root',
        'password' =>'',
        'db'=>'map_db'
    ),
    // 'mysql'=>array(
        //hostinger connection
    //     'host' => '109.106.251.63',
    //     'username' =>'port7396_cave_daap',
    //     'password' =>'p@ssw0rdBSIT4A',
    //     'db'=>'port7396_mapdb'
    // ),
    'remember'=>array(
        'cookie_name' => 'hash',
        'cookie_expiry' =>604800
    ),
    'session'=>array(
        'session_name' =>'user',
        'token_name' =>'token'
    )
    );


spl_autoload_register(function($class){
    require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/'.$class.'.php';

});
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/functions/sanitize.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/functions/funct.php';
if(Cookie::exists(Conf::get('remember/cookie_name')) && !Session::exists(Conf::get('session/session_name'))){
    $hash = Cookie::get(Conf::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('user_session', array('hash','=',$hash));

    if($hashCheck->count()){
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}
?>
