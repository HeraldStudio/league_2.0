<?php
/*

*名称：common.php

*功能: 项目公用函数文件

*作者：Tairy

*更新日期：2012.12.21

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
		
		//这里添加代码获取更详细的评论信息
		
		//$this -> content = $comment[$j]['content'];
		$content = $comment[$j]['content'];
		/*获取该评论下对应的回复*/

		$Answer = M('Answer');
		$answer = $Answer -> where('comment_id ='.$comment[$j]['id']) -> select();
		//$this -> assign('answer', $answer);
	}
	return array( $content, $answer);
	//$this -> display();
}
?>