<?php
/*

*名称：社团类别页

*功能: 显示社团类别 社团模块入口

*作者：Tairy

*更新日期：2012.12.17

*/
class IndexAction extends Action {
    public function index()
	{
		$LeagueClass = D('League_class');
		$leagueclass = $LeagueClass -> select();
		$this -> assign('leagueclass', $leagueclass);
		$this -> display();
    }
    public function map()
    {
        $this->top = intval($this->_param('top'));
        $this->left = intval($this->_param('left'));
        $leagueInfo = D('leagueInfo');
        $this->league = $leagueInfo->getAllLeague();
        $this->display();
    }

    //ONLY FOR INIT,
    public function init()
    {
        $a = array(
            'left:572px;top:590px;width:40px;height:35px;',
            'left:542px;top:660px;width:40px;height:35px;',
            'left:615px;top:695px;width:40px;height:35px;',
            'left:625px;top:642px;width:40px;height:35px;',
            'left:715px;top:624px;width:40px;height:35px;',
            'left:580px;top:750px;width:40px;height:35px;',
            'left:712px;top:689px;width:40px;height:35px;',
            'left:780px;top:689px;width:40px;height:35px;',
            'left:710px;top:754px;width:40px;height:35px;',
            'left:780px;top:767px;width:40px;height:35px;',
            'left:470px;top:752px;width:40px;height:35px;',
            'left:713px;top:836px;width:40px;height:35px;',
            'left:782px;top:863px;width:40px;height:35px;',
            'left:713px;top:918px;width:40px;height:35px;',
            'left:710px;top:975px;width:40px;height:35px;',
            'left:400px;top:852px;width:40px;height:35px;',
            'left:420px;top:923px;width:40px;height:35px;',
            'left:545px;top:968px;width:40px;height:35px;',
            'left:520px;top:870px;width:40px;height:35px;',
            'left:715px;top:1600px;width:40px;height:35px;',
            'left:955px;top:280px;width:40px;height:35px;',
            'left:1050px;top:330px;width:40px;height:35px;',
            'left:960px;top:356px;width:40px;height:35px;',
            'left:940px;top:465px;width:40px;height:35px;',
            'left:1048px;top:420px;width:40px;height:35px;',
            'left:780px;top:465px;width:40px;height:35px;',
            'left:760px;top:368px;width:40px;height:35px;',
            'left:1049px;top:515px;width:40px;height:35px;',
            'left:1165px;top:460px;width:40px;height:35px;',
            'left:1055px;top:620px;width:40px;height:35px;',
            'left:1125px;top:690px;width:40px;height:35px;',
            'left:1145px;top:588px;width:40px;height:35px;',
            'left:1208px;top:640px;width:40px;height:35px;',
            'left:888px;top:590px;width:40px;height:35px;',
            'left:950px;top:695px;width:40px;height:35px;',
            'left:988px;top:760px;width:40px;height:35px;',
            'left:1400px;top:589px;width:40px;height:35px;',
            'left:1375px;top:645px;width:40px;height:35px;',
            'left:1450px;top:695px;width:40px;height:35px;',
            'left:1375px;top:758px;width:40px;height:35px;',
            'left:1265px;top:758px;width:40px;height:35px;',
            'left:1452px;top:799px;width:40px;height:35px;',
            'left:1372px;top:859px;width:40px;height:35px;',
            'left:1435px;top:917px;width:40px;height:35px;',
            'left:1378px;top:970px;width:40px;height:35px;',
            'left:1380px;top:1025px;width:40px;height:35px;',
            'left:1208px;top:960px;width:40px;height:35px;',
            'left:1276px;top:885px;width:40px;height:35px;',
            'left:1160px;top:829px;width:40px;height:35px;',
            'left:1120px;top:899px;width:40px;height:35px;',
            'left:1227px;top:1109px;width:40px;height:35px;',
            'left:1067px;top:1109px;width:40px;height:35px;',
            'left:1160px;top:1021px;width:40px;height:35px;',
            'left:1206px;top:1189px;width:40px;height:35px;',
            'left:1250px;top:1275px;width:40px;height:35px;',
            'left:1080px;top:1280px;width:40px;height:35px;',
            'left:940px;top:1220px;width:40px;height:35px;',
            'left:1050px;top:1180px;width:40px;height:35px;',
            'left:969px;top:920px;width:40px;height:35px;',
            'left:1048px;top:967px;width:40px;height:35px;',
            'left:975px;top:860px;width:40px;height:35px;',
            'left:900px;top:1020px;width:40px;height:35px;',
            'left:900px;top:1100px;width:40px;height:35px;',
            'left:883px;top:1277px;width:40px;height:35px;',
            'left:969px;top:1345px;width:40px;height:35px;',
            'left:1139px;top:1345px;width:40px;height:35px;',
            'left:1385px;top:1280px;width:40px;height:35px;',
            'left:1375px;top:1350px;width:40px;height:35px;',
            'left:1390px;top:1426px;width:40px;height:35px;',
            'left:1560px;top:1446px;width:40px;height:35px;',
            'left:1545px;top:1512px;width:40px;height:35px;',
            'left:1570px;top:1609px;width:40px;height:35px;',
            'left:1377px;top:1673px;width:40px;height:35px;',
            'left:1560px;top:1673px;width:40px;height:35px;',
            'left:1380px;top:1740px;width:40px;height:35px;',
            'left:1560px;top:1753px;width:40px;height:35px;',
            'left:1395px;top:1510px;width:40px;height:35px;',
            'left:1405px;top:1590px;width:40px;height:35px;',
            'left:1280px;top:1480px;width:40px;height:35px;',
            'left:1240px;top:1600px;width:40px;height:35px;',
            'left:1230px;top:1674px;width:40px;height:35px;',
            'left:1060px;top:1669px;width:40px;height:35px;',
            'left:1070px;top:1600px;width:40px;height:35px;',
            );
            $leagueInfo = D('LeagueInfo');
            //$leagueInfo->addAll($a);
            foreach ($a as $key => $value) {
                $leagueInfo->add(array('location'=>$value));
                //$leagueInfo->addAll($a);
            }
    }
}
?>