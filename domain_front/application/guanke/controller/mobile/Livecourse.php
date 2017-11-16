<?php
// +----------------------------------------------------------------------
// | 联盟管理平台
// +----------------------------------------------------------------------
// | Copyright (c) 2017~2020 http://www.qyhzlm.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( 商业版权，禁止传播，违者必究 )
// +----------------------------------------------------------------------
// | Author: oliver <2244115959@qq.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 学校主页面
// +----------------------------------------------------------------------
namespace app\guanke\controller\mobile;

use app\mobile\controller\MobileController;
use app\guanke\model\GuankeSchool;
use app\guanke\model\GuankeCourse;
use app\guanke\model\GuankeLivecourse;

class Livecourse extends MobileController {
	public function initialize() {
		parent::initialize ();
	}
	
	/**
	 * 学校主页面
	 */
	public function index() {
		$detail = GuankeSchool::find();
		$this->assign('school',$detail);
		$courseList = GuankeLivecourse::order('starttime desc')->select();
		$this->assign('courseList',$courseList);
		return $this->fetch ();
	}
	
	/**
	 * 课程页面
	 */
	public function detail(){
		$school_id = $this->request->param('school_id');
		$school = GuankeSchool::find();
		$id = $this->request->param('id');
		$detail = GuankeLivecourse::find($id);
		$this->assign('detail',$detail);
		$this->assign('school',$school);
		return $this->fetch ();
	}
}