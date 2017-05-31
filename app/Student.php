<?php 
namespace App;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	// 指定表名
	protected $table = 'student';

	// 指定主键
	protected $primaryKey = 'id';

	// 允许批量赋值的字段
	protected $fillable = ['name', 'age'];

	// 指定不允许批量赋值的字段
	protected $guarded = ['name', 'age'];

	// 自动维护时间戳
	public $timestamps = TRUE;

	// 关闭自动维护时间戳
	// public $timestamps = FALSE;

	// 维护时间保存为时间戳
	protected function getDateFormat() {
		return time();
	}

	// 取出时间记录返回时间戳
	protected function asDateTime($time) {
		return $time;
	}
}
?>
