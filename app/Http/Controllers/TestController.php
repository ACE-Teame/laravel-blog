<?php 
namespace App\Http\Controllers;
class TestController extends Controller
{

public function index($id) {
	return view('test', ['id' => $id]);
	// 如果在`views`目录下还有文件路径，输出视图时添加路径即可，如`view('test/test')`
}	

	// public function info($id) {
	// 	return 'controller-test-info-id'.$id;
	// }
}