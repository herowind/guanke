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
// | 学校监控模型
// +----------------------------------------------------------------------
namespace app\guanke\model;

use app\manage\model\CommonMod;

class GuankeLiveschool extends CommonMod
{
    public function getMembervisibilitytextAttr($value,$data){
        $types = config('data.camera.membervisibility');
        return $types[$data['membervisibility']];
    }
    
    //学校转换成数组
    public function getSchoolAttr($value){
        if($value){
            return json_decode($value,true);
        }
        return [];
    }
    
    //摄像头转换成数组
    public function getCameraAttr($value){
        if($value){
            return json_decode($value,true);
        }
        return [];
    }
}