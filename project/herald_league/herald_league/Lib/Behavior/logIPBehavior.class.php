<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xie
 * Date: 13-2-18
 * Time: 下午9:10
 * To change this template use File | Settings | File Templates.
 */
class logIPBehavior extends Behavior
{
    public function run(&$params)
    {
        $ip = M('ip');
        $userIP = get_client_ip();
        $data = array(
            'ip'=>$userIP,
            'date'=>date('Y-m-d H:i:s',time()),

        );
        $ip->add($data);
    }
}
