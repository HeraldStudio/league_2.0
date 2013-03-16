<?php
/*

*名称：CommentModel.class.php

*功能: 评论模型文件

*作者：Tairy

*更新日期：2013.1.15

*/
class CommentModel extends Model
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

	函数功能：获取评论信息函数
	
	参数信息：第一个参数是被评论者的id

			  第二个参数是被评论者的类型

	  返回值：返回当前需要的所有评论的一个数组
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
	*/

    public function getCommentInfo ( $commedinfo, $commedtype )
    {	
    	if( is_int( $commedinfo ) )
    	{
	    	$comment = $this -> where( 'commed_id = '.$commedinfo.' AND commed_type = '.$commedtype ) -> select();//对社团的评论 commed_id = 1
	    	return $comment;
	    }
	    else
	    {
	    	foreach ($commedinfo as $commentedinfos) 
			{
				$comment[$commentedinfos['id']] = $this -> where( 'commed_id = '.$commentedinfos['id'].' AND commed_type = '.$commedtype ) -> select();
			}
			return $comment;
	    }
    }

    public function getCommentInfoById( $commentid )
    {
    	return $this -> where('id = '.$commentid) -> find();
    }

    /*

	函数功能：添加评论信息函数
	
	参数信息：第一个参数是评论者id

	  		  第二个参数是评论者类型

	  		  第三个参数是被评论者id

	  		  第四个参数是被评论这类型

	  		  第五个参数是表单提交数据

	  返回值：返回数据添加结果
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
	*/

    public function addCommentInfo ( $commingid, $commingtype, $commedid, $commedtype, $postdata )
    {
		$data_c['comming_id'] = $commingid;
		$data_c['comming_type'] = $commingtype;
		$data_c['commed_id'] = $commedid;
		$data_c['commed_type'] = $commedtype;
		$data_c['content'] = htmlencode( $postdata['content_c'] );
		
		if( $this->create() ) 
		{
            return $this -> add($data_c);
        }
        else
        {
            return "error";
        }
    }

    /*

	函数功能：获取被评论者类型的id
	
	参数信息：参数是被评论者类型

	  返回值：返回被评论者类型id
			  
	    作者：Tairy
	
	更新日期：2013/01/17
	
	*/

    public function getCommentedType( $commenttypename )
    {
    	$Commenttype = M('Commented_type');
    	$commenttypeid = $Commenttype -> getFieldByType( $commenttypename, 'id' );
    	return $commenttypeid;
    }
}

?>