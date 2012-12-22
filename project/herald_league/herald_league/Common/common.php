<?php
/*

*名称：common.php

*功能: 项目公用函数文件

*作者：Tairy & xie

*更新日期：2012.12.21

*/

	/*
	
		函数功能：获取评论和回复信息
		
		参数信息：第一个参数是被评论者的id
		
				  第二个参数是被评论者的类型
		
		  返回值：是一个数组 第一个元素是一条评论的信息 
		
		          第二个元素是当前评论下的所有回复信息
				  
		    作者：Tairy
		
		更新日期：2012/12/22
		
	*/
function getCommentAndAnswer( $commentedid, $commenttype )
{
	/*获取评论信息*/

	$Comment = M('Comment');
	$comment = $Comment -> where('commed_id ='.$commentedid.' AND commed_type ='.$commenttype) -> select();
	$secondlooptimes = count($comment);
	
	for( $j = 0; $j < $secondlooptimes; $j++ )
	{	
		/*评论基本信息*/
		$commentinfo = $comment[$j];
		
		/*获取该评论下对应的回复*/
		$Answer = M('Answer');
		$answer = $Answer -> where('comment_id ='.$comment[$j]['id']) -> select();
	}
	return array( $commentinfo, $answer );
}
?>