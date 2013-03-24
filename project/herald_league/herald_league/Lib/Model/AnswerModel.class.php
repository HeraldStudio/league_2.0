<?php
/*

*名称：AnswerModel.class.php

*功能: 回复模型文件

*作者：Tairy

*更新日期：2013.1.15

*/
class AnswerModel extends Model 
{
	// 定义自动验证
    protected $_validate = array(
        array('content','require','内容必须'),
        );
    // 定义自动完成
    protected $_auto = array(
        array('content','htmlencode',3,'function'),
        );
	/*

	函数功能：获取当前回复信息函数
	
	参数信息：参数是当前所有评论的一个数组

	  返回值：返回一个三维数组，最高维键值是对应的评论的id
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
	*/

    public function getAnswerInfo( $commentinfo )
    {
    	if( countdim( $commentinfo ) == 2)
    	{
	    	foreach ( $commentinfo as $comments ) 
			{
				$answer[$comments['id']]= $this -> where( 'comment_id ='.$comments['id'] ) -> select();
			}
			return $answer;
		}
		elseif ( countdim( $commentinfo ) == 3 ) 
		{
			foreach ($commentinfo as $comments) 
			{
				foreach ($comments as $eachcomment) 
				{
					$answer[$eachcomment['id']] = $this -> where( 'comment_id ='.$eachcomment['id'] ) -> select();
				}
			}
			return $answer;
		}
    }

    public function getAnswerByCommentId( $commentid )
    {
    	return $this -> where( 'comment_id ='.$commentid ) -> select();
    }

    /*

	函数功能：添加回复函数
	
	参数信息：第一个参数是对应的评论id

			  第二个参数是回复者id

			  第三个参数是回复者类型

			  第四个参数是表单提交数据

	  返回值：返回添加结果
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
	*/

    public function addAnswerinfo( $answeringid, $answeringtype, $postdata )
    {
     	$temp = explode('/', $postdata['data']);
     	$data_a['comment_id'] = $temp[0];
     	$data_a['answered_id'] = $temp[1];
     	$data_a['answered_type'] = $temp[2];
		$data_a['answering_id'] = $answeringid;
		$data_a['answering_type'] = $answeringtype;
		$data_a['floor_id'] = 1;
		$data_a['is_new'] = 1;
		$data_a['content'] = htmlencode( $postdata['content'] );


		if($this->create()) 
		{
            $this -> add($data_a);
            return "success";
        }
        else
        {
            return "error";
        }
    }
    public function getNewAnswerNum( $answeredid, $answeredtype )
    {
    	$data['answered_id'] = $answeredid;
    	$data['answered_type'] = $answeredtype;
    	$data['is_new'] = 1;
    	return $this -> where($data) -> count();
    }
}
?>