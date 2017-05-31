<?php 

namespace App\http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Student;
class StudentController extends Controller
{

	public function info() {
		// DB facade(原始查找)
		// 插入
		// $boolIns = DB::insert('insert into user(name,sex,age)values(?,?,?)', ['liu', 1, 17]);
		// var_dump($flag);
		// 更新
		// $boolUpt = DB::update('update user set name = ? where age = ?', ['immocv', 20]);
		// var_dump($boolUpt);
		// 查询
		// $users = DB::select('select * from user where age >= 19');
		// pe($users);
		// 删除
		$boolDel = DB::delete('delete from user where age = ?', [20]);
		pe($boolDel);
		// 
		
		// 查询构造器
		
		// return 'user-info';
	}
	// 使用查询构造器增加数据
	public function query() {
		$boolIns = DB::table('user')->insert(['name' => 'chen', 'age' => 24, 'sex' => 1]);

		pe($boolIns);
		
		$intInsId = DB::table('user')->insertGetId(
			['name' => 'chen2', 'age' => 25, 'sex' => 1]
		);
		pe($intInsId);
		
		/**
		 * 批量插入数据
		 * 批量插入数据前 在对应模型中指定可批量插入的字段
		 * protected $fillable = ['name', 'age']; //允许批量赋值的字段
		 * protected $guarded = ['name', 'age']; //指定不允许批量赋值的字段
		 */
		DB::table('user')->insert(
			['name' => 'chen3', 'age' => 26, 'sex' => 1],
			['name' => 'chen4', 'age' => 27, 'sex' => 1]
		);
		pe($boolIns);
	}

	// 使用查询构造器更新数据
	public function queryins() {
// 根据条件更新数据
$intUptNum = DB::table('user')
	->where('id','>',3)
	->update(['age' => 25]
);

// 自增
DB::table('user')->increment('age', 3);
// 自减
DB::table('user')->decrement('age', 3);
// 根据条件自增或自减
DB::table('user')
	->where('id', '>', 3)
	->decrement('age', 3);
// 根据条件自减字段并更新数据
DB::table('user')
	->where('id', '>', 3)
	->decrement('age', 3, ['name' => 'chen']);
	}

	// 使用查询构造器删除数据
	public function querydel() {
// $delnum = DB::table('user')->where('id', 8)->delete();
// pe($delnum);
// DB::table('user')->truncate();
		

	}

	public function querysel(){
// get 获取表所有数据
$users = DB::table('user')->get();

// frist 获取结果集第一条数据
$users = DB::table('user')->orderBy('id','desc')->first();

// where 根据条件查询数据
$users = DB::table('user')
	->where('id', '>=', '5')
	->get();

// whereRaw 根据多条件查询数据
$users = DB::table('user')
	->whereRaw('id <= ? and name = ?', [6, 'chen'])
	->get();

// pluck 多条件查找并显示某一字段
$users = DB::table('user')
	->whereRaw('id <= ? and name = ?', [6, 'chen'])
	->pluck('id');

// lists 第一个参数为查找的字段 第二个参数为key值
$users = DB::table('user')
	->whereRaw('id <= ? and name = ?', [6, 'chen'])
	->lists('name', 'id');

// 指定查找字段
$users = DB::table('user')
	->select('id', 'name')
	->get();
 	
// 	chunk 批量查找
DB::table('user')->chunk(2, function($user) {

});
	}

	public function queryjuhe() {
// count 总记录数
DB::table('user')->count();
// max 最大值
DB::table('user')->max('age');
// min 最小值
DB::table('user')->min('age');
// min 平均值
DB::table('user')->avg('age');
// sum 某一字段总和
DB::table('user')->sum('age');
		pe($sum);
	}


	public function orm(){
		//1、简介、模型的建立、查询数据
		//2、新增数据、自定义时间戳、批量赋值
		//3、修改数据
		//4、删除数据
// all 查询表的所有记录
$users = Student::all();

// 根据主键查找数据
$user = Student::find(1);

// 根据主键查找 没有则报错
$user = Student::findOrFail(10);

// 根据条件查找数据
$users = Student::where('id', '>=', 1)->orderBy('id', 'desc')->get();

// 批量取出数据
Student::chunk(2, function($user) {
	var_dump($user);
});
		pe($users);
	}

	public function ormins() {

// 实例化插入
$objUser = new Student();
$objUser->name='test';
$objUser->age = 18;
// 调用save保存
$bool = $objUser->save();

// create 模型方法保存数据 发挥模型实例
$user = Student::create(
	['name' => 'xiaochen', 'age' => 17]
);

// firstOrCreate 以属性查找并返回数据实例 若没有插入并返回实例
$user = Student::firstOrCreate(
	['name' => 'xiaochen2']
);

// firstOrNew 以属性查找用户 如没有则新建实例 若需要保存自己调用save
$user = Student::firstOrNew(
	['name' => 'xiaochen23']
); 
$user->save();


		pe($user);

		// echo $users->created_at;
	}

	public function ormupt() {

// 通过模型更新数据
$objuser = Student::find(14);
$objuser->name = 'kitty';
// 调用save保存
$objuser->save();

// 结合查询语句批量更新 返回更新行数
Student::where('id', '>', 13)
	->update(['age' => 21]);
		pe($num);

	}

	public function ormdel() {
// 通过模型删除 
$user = Student::find(15);
$bool = $user->delete();

/**
 * destroy 通过主键删除
 * 参数可以为主键数组destroy([11, 12])
 * 多个参数destroy(11, 12)
 */
$num = Student::destroy([11,12]);

// 通过条件删除
$num = Student::where('id','>', 7)->delete([11,12]);
		pe($num);
	}
}

 ?>