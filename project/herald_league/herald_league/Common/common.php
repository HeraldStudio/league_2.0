<?php
/*

*名称：common.php

*功能: 项目公用函数文件

*作者：Tairy & xie

*更新日期：2012.12.21

*/

/*

	函数功能：获取评论者信息
	
	参数信息：参数是评论者id*10+评论者type构造的一个数据 主要是为了克服

			  TP的一个不足
	
	  返回值：返回评论者名称
			  
	    作者：Tairy
	
	更新日期：2013/01/14

	      注：这个函数可能后期执行的时候还会有问题
	
*/

function getCommenterInfo ( $commentingArgument )
{
	$commentingId = intval( $commentingArgument / 10 );
	$commentingType = $commentingArgument % 10;
	
	if ( $commentingType == 1 )// 1表示普通用户
	{
		$User = M('user');
		$user = $User -> where( 'id ='.$commentingId ) -> find();
		echo $user['true_name'];
	}
	elseif ( $commentingType == 2 ) // 2表示社团用户
	{
		$League = M('league_info');
		$league = $League -> where( 'id ='.$commentingId ) -> find();
		echo $league['league_name'];
	}
}

/*

	函数功能：php过滤函数
	
	参数信息：参数是被过滤的字符串
	
	  返回值：返回过滤之后的字符串
			  
	    作者：Tairy
	
	更新日期：2013/01/14
	
*/

function htmlencode($str)
{
	if(empty($str))
		return;

	if($str=="") 
		return $str;

	$str=trim($str);
	$str=str_ireplace("&","&amp;",$str);
	$str=str_ireplace(" ","&nbsp;",$str);
	$str=str_ireplace(">","&gt;",$str);
	$str=str_ireplace("<","&lt;",$str);
	$str=str_ireplace(chr(32),"&nbsp;",$str);
	$str=str_ireplace(chr(9),"&nbsp;",$str);
	$str=str_ireplace(chr(34),"&",$str);
	$str=str_ireplace(chr(39),"&#39;",$str);
	$str=str_ireplace(chr(13),"<br />",$str);
	$str=str_ireplace("'","&#039;",$str);
	$str=str_ireplace("select","sel&#101;ct",$str);
	$str=str_ireplace("join","jo&#105;n",$str);
	$str=str_ireplace("union","un&#105;on",$str);
	$str=str_ireplace("where","wh&#101;re",$str);
	$str=str_ireplace("insert","ins&#101;rt",$str);
	$str=str_ireplace("delete","del&#101;te",$str);
	$str=str_ireplace("update","up&#100;ate",$str);
	$str=str_ireplace("like","lik&#101;",$str);
	$str=str_ireplace("drop","dro&#112;",$str);
	$str=str_ireplace("create","cr&#101;ate",$str);
	$str=str_ireplace("modify","mod&#105;fy",$str);
	$str=str_ireplace("rename","ren&#097;me",$str);
	$str=str_ireplace("alter","alt&#101;r",$str);
	$str=str_ireplace("cast","ca&#115;",$str);
	return $str;
}

/*

	函数功能：php还原函数
	
	参数信息：参数是过滤后的字符串
	
	  返回值：返回过滤前的字符串
			  
	    作者：Tairy
	
	更新日期：2013/01/14
	
*/

function htmldecode($str)
{
	if(empty($str)) 
		return;
	if($str=="") 
		return $str;

	$str=str_replace("&amp;","&",$str);
	$str=str_replace("&gt;",">",$str);
	$str=str_replace("&lt;","<",$str);
	$str=str_replace("&nbsp;",chr(32),$str);
	$str=str_replace("&nbsp;",chr(9),$str);
	$str=str_replace("&",chr(34),$str);
	$str=str_replace("&#39;",chr(39),$str);
	$str=str_replace("<br />",chr(13),$str);
	$str=str_replace("''","'",$str);
	$str=str_replace("sel&#101;ct","select",$str);
	$str=str_replace("jo&#105;n","join",$str);
	$str=str_replace("un&#105;on","union",$str);
	$str=str_replace("wh&#101;re","where",$str);
	$str=str_replace("ins&#101;rt","insert",$str);
	$str=str_replace("del&#101;te","delete",$str);
	$str=str_replace("up&#100;ate","update",$str);
	$str=str_replace("lik&#101;","like",$str);
	$str=str_replace("dro&#112;","drop",$str);
	$str=str_replace("cr&#101;ate","create",$str);
	$str=str_replace("mod&#105;fy","modify",$str);
	$str=str_replace("ren&#097;me","rename",$str);
	$str=str_replace("alt&#101;r","alter",$str);
	$str=str_replace("ca&#115;","cast",$str);

	return $str;
}

/*

	函数功能：判断数组维数
	
	参数信息：参数需判断数组

	  返回值：返回数组维数
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
*/

function countdim($array)
{
    if (is_array(reset($array)))
    {
        $return = countdim(reset($array)) + 1;
    }

    else
    {
        $return = 1;
    }

    return $return;
}
?>