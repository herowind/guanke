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
use app\guanke\model\GuankeLivecourse;

class Home extends MobileController {
	public function initialize() {
		parent::initialize ();
	}
	
	/**
	 * 学校主页面
	 */
	public function index() {
		$detail = GuankeSchool::find();
		$this->assign('school',$detail);
		$courseList = GuankeLivecourse::select();
		$this->assign('courseList',$courseList);
		$this->assign('pageTitle',$detail->name);
		return $this->fetch ();
	}
}