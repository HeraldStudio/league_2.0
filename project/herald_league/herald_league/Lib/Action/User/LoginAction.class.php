<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xie
 * Date: 13-2-18
 * Time: 下午3:32
 * To change this template use File | Settings | File Templates.
 */
class LoginAction extends Action
{
		public function index()//显示登录框
		{
				C('SHOW_PAGE_TRACE',false);
				$this->display();
		}

		public function login()//处理登录
		{
			//if(!$this->isAjax())
			//	$this->error('method is not allowed');
			
			$card = intval($this->_param('cardNumber'));
			$pass = $this->_param('passWord');
			$result = $this->authen($card,$pass);
			if($result != null)
			{
					session(array('name'=>'heraldUser','expire'=>3600));
					session('heraldUser',$result);
					$user  = D('User');
					$updateResult=$user->update($result);
					$this->success($updateResult);
			}
			else
			{
					$this->error('');
			}
		}
		private function authen($card,$pass) //验证一卡通，密码是否正确
		{
				$ch = curl_init('121.248.63.105:8080/authentication/');
				curl_setopt($ch, CURLOPT_HEADER, false);  
				curl_setopt($ch, CURLOPT_FAILONERROR,1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
				curl_setopt($ch, CURLOPT_POST,1);
				curl_setopt($ch, CURLINFO_HEADER_OUT, true);
				$param ="username=$card&password=$pass";
				curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
				$result=curl_exec($ch);  
				$info = curl_getinfo($ch);
				if($info['http_code']==200)
				{
						return $result;
				}
				else
				{
						return null;
				}
				
				
		}
}
?>
