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

/*

	函数功能：获取评论者的信息
	
	参数信息：第一个参数是评论者的id
	
			  第二个参数是评论者的类型 1表示普通用户 2表示社团用户
	
	  返回值：返回评论者信息的数组 第一个元素是评论这名字 

	   		  添加返回值即可获取更详细的评论这信息
			  
	    作者：Tairy
	
	更新日期：2012/12/23
	
*/

function getCommingInfo( $commingid, $commingtype )
{
	if($commingtype == 1)
	{
		$User = M('User');
		$user = $User -> where('id ='.$commingid) -> find();
		return array( $user['true_name'] );
	}
	else if($commingtype == 2)
	{
		$League = M('League_info');
		$league = $League -> where('id ='.$commingid) -> find();
		return array( $league['league_name'] );
	}
}

/*

	函数功能：获取评论者信息
	
	参数信息：参数是评论者id*10+评论者type构造的一个数据 主要是为了克服

			  TP的一个不足
	
	  返回值：返回评论者名称
			  
	    作者：Tairy
	
	更新日期：2012/12/23

	      注：这个函数可能后期执行的时候还会有问题
	
*/

function getAnsweringInfo( $answeringidandtype )
{
	$answeringtype = $answeringidandtype % 10;

	$answeringid = intval($answeringidandtype / 10);
	//echo $answeringid;
	if($answeringtype == 1)
	{
		$User = M('User');
		$user = $User -> where('id ='.$answeringid) -> find();
		return $user['true_name'];
	}
	else if($answeringtype == 2)
	{
		$League = M('League_info');
		$league = $League -> where('id ='.$answeringid) -> find();
		return $league['league_name'];
	}
}
?>