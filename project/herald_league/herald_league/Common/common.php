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
	
	更新日期：2012/12/23

	      注：这个函数可能后期执行的时候还会有问题
	
*/

function getCommentInfo( $commentingArgument )
{
	$commentingId = $commentingArgument / 10;
	$commentingType = $commentingArgument % 10;
	echo $commentingId;
}
?>