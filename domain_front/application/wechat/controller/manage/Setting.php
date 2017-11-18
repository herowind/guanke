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
// | 课程管理
// +----------------------------------------------------------------------
namespace app\wechat\controller\manage;

use function GuzzleHttp\json_encode;
use app\wechat\model\WechatSetting;

class Setting extends WechatController
{

    public function initialize()
    {
        parent::initialize();
    }

    /**
     * 公司旗下的所有课程
     */
    public function index()
    {
    	$detail = WechatSetting::get($this->getCid());
    	$url = $this->openPlatform->getPreAuthorizationUrl('http://'.$_SERVER['HTTP_HOST'].'/wechat/manage.setting/save.html');
    	$this->assign('url',$url);
    	$this->assign('detail',$detail);
        return $this->fetch();
    }
    
    public function save(){
    	/**
    	 * "authorization_info": {
		 * "authorizer_appid": "wxf8b4f85f3a794e77", 
		 * "authorizer_access_token": "QXjUqNqfYVH0yBE1iI_7vuN_9gQbpjfK7hYwJ3P7xOa88a89-Aga5x1NMYJyB8G2yKt1KCl0nPC3W9GJzw0Zzq_dBxc8pxIGUNi_bFes0qM", 
		 * "expires_in": 7200, 
		 * "authorizer_refresh_token": "dTo-YCXPL4llX-u1W1pPpnp8Hgm4wpJtlR6iV0doKdY", 
    	 * @var unknown
    	 */
    	$authInfo = $this->openPlatform->handleAuthorize();
    	$this->openPlatform['logger']->debug('ComponentWechat:',['authInfo'=>$authInfo]);
    	$authorizer = $this->openPlatform->getAuthorizer($authInfo['authorization_info']['authorizer_appid']);
    	$this->openPlatform['logger']->debug('ComponentWechat:',['authorizer'=>$authorizer]);
    	$setting = [
    		'cid' => $this->getCid(),
    		'name' => $authorizer['authorizer_info']['nick_name'],
    		'appid'=> $authInfo['authorizer_appid'],
    		'authorizer_info' =>json_encode($authorizer['authorizer_info'],JSON_UNESCAPED_UNICODE),
    		'component_appid' =>config('wechat.component.app_id'),
    		'authorizer_refresh_token' =>$authInfo['authorizer_refresh_token'],
    	];
    	$detail = WechatSetting::get($this->getCid());
    	if(empty($detail)){
    		WechatSetting::create($setting);
    	}else{
    		$detail->save($setting);
    	}
    	$this->redirect('index');
    }

    /**
     * 编辑课程
     */
    public function edit()
    {
        $params = $this->request->param();
        if ($this->request->isPost()) {
            $validate = new CourseValid();
            $checkRst = $validate->check($params, '', 'edit');
            if ($checkRst !== true) {
                // 验证失败
                $this->error($validate->getError());
            } else {
                // 验证通过
                
                //上传banner
                $rtnBanner = $this->uploadCut('banner');
                if($rtnBanner !== false){
                    $params['banner'] = $rtnBanner;
                }
                
                if ($params['id']) {
                    // 更新操作
                    $detail = GuankeCourse::manage()->find($params['id']);
                    $flag = $detail->save($params);
                    if ($flag !== false) {
                        $this->success('保存成功', $this->getLastUrl());
                    } else {
                        $this->error('保存失败');
                    }
                } else {
                    // 新增操作
                    $params['cid'] = $this->getCid();
                    $flag = GuankeCourse::create($params);
                    if ($flag !== false) {
                        $this->success('新增成功', $this->getLastUrl());
                    } else {
                        $this->error('新增失败');
                    }
                }
            }
        } else {
            if ($params['id']) {
                $detail = GuankeCourse::manage()->find($params['id']);
                $this->assign('detail', $detail);
            } else {
                $detail = [
                    'isdisplay' => 1
                ];
                $this->assign('detail', $detail);
            }
            
            return $this->fetch('edit');
        }
    }

    /**
     * 删除课程
     */
    public function remove()
    {
        $params = $this->request->param();
        $flag = GuankeCourse::manage()->delete($params['id']);
        if ($flag == 1) {
            return $this->success('删除成功');
        } else {
            return $this->error('信息不存在');
        }
    }

    /**
     * 排序变更
     */
    public function sortChange()
    {
        $id = $this->request->param('id');
        $sort = $this->request->param('sort');
        $detail = GuankeCourse::manage()->find($id);
        $detail->sort = $sort;
        $flag = $detail->save();
        if ($flag !== false) {
            $this->success('操作成功', '', $sort);
        } else {
            $this->error('操作失败', '', $sort);
        }
    }

    /**
     * 状态变更
     */
    public function statusChange()
    {
        $id = $this->request->param('id');
        $field = $this->request->param('field');
        $detail = GuankeCourse::manage()->find($id);
        
        if ($detail->$field === 1) {
            $detail->$field = 0;
        } else {
            $detail->$field = 1;
        }
        $flag = $detail->save();
        if ($flag !== false) {
            $this->success('操作成功', '', $detail->$field);
	    }else{
	        $this->error('操作失败','',$detail->$field);
	    }
	}
	
}