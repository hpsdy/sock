<?php
/**
 * Created by PhpStorm.
 * User: qinhan
 * Date: 2016/4/6
 * Time: 17:38
 */
use Workerman\Worker;
require './Workerman-master/Autoloader.php';
$global_uid = 0;
function handle_connect($connect){
	global $worker,$global_uid;
	$connect->uid = ++$global_uid;
}
function handle_mes($connect,$data){
	global $worker;
	foreach ($worker->connections as $con){
		$con->send("user$connect->uid said:$data");
	}

}
function handle_close($connect){
	global $worker;
	foreach ($worker->connections  as $con){
		$con->send("user$connect->uid said:close");
	}

}
$woker = new Worker("text://0.0.0.0:2347");
$woker->count = 1;
$woker->onConnect = 'handle_connect';
$woker->onMessage = 'handle_mes';
$woker->onClose = 'handle_close';

Worker::runAll();