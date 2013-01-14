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

	函数功能：获取评论回复信息
	
	参数信息：第一个参数是被评论者的信息的一个数组

			  第二个参数是被评论者类型
	
	  返回值：返回包含评论和回复信息的数组
			  
	    作者：Tairy
	
	更新日期：2013/01/14
	
*/
function getCommentAndAnswer( $commentedinfo, $commentertype )
{
	/*获取评论和回复信息*/
	$Comment = M('Comment');
	$Answer = M('Answer');

	foreach ($commentedinfo as $commentedinfos) 
	{
		$comment[$commentedinfos['id']] = $Comment -> where( 'commed_id ='.$commentedinfos['id'].' AND commed_type = '.$commentertype ) -> select();
	}

	foreach ($comment as $comments) 
	{
		foreach ($comments as $eachcomment) 
		{
			$answer[$eachcomment['id']] = $Answer -> where( 'comment_id ='.$eachcomment['id'] ) -> select();
		}
	}

	return array( $comment, $answer ); 
}
?>