<?php
Class SearchAction extends Action
{
	/*

	函数功能：搜索结果页面控制函数
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/02/17
	
	*/
	public function search()
	{	
		$searchtext = $_POST['search_text'];

		/*搜索框*/
		import('@.ORG.Search');

		$search = new Search();
		if(!empty($_POST['search_text']))
		{
			$result = $search -> getSearchResult($searchtext);
			if(!empty($result))
			{
				$activity = $result['activity'];
				$league = $result['league'];
				$Attention = D('Attention'); 
				$Activity = D('Activity');
				$League = D('LeagueInfo');
				foreach ($league as $key => $leagues) 
				{
					$league[$key]['attentednum'] = $Attention -> getAttentionLeagueNum($leagues['id']);
				}
				foreach ($activity as $key => $activitys) 
				{
					$activity[$key]['attentednum'] = $Attention -> getAttentionActivityNum($activitys['id']);
					$activity[$key]['acitvitystate'] = $Activity -> getActivityState($activitys['id']);
					$activity[$key]['leagueavatar'] = $League -> getleagueAvaterAdd($activitys['league_id']);
					$activity[$key]['leaguename'] = $League -> getleagueName($activitys['league_id']);
				}
				$this -> isresultempty = false;
				$this -> assign('activity', $activity);
				$this -> assign('league', $league);
			}
			else
			{
				$this -> isresultempty = true;	
			}
		}
		$this -> display();
	}
}
?>