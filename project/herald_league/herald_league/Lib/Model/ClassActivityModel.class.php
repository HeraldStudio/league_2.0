<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xie
 * Date: 13-2-6
 * Time: 下午5:36
 */
class ClassActivityModel extends Model
{
    /**向活动添加标签
     * @param $activityID
     * @param $className
     * @return boolean
     * @version 2013.2.6
     */
    public function addClass($activityID,$className)
    {
        $activityClass = D('ActivityClass');
        $classID=$activityClass->addClass($className);//不会重复被添加，返回的是标签的id
        if($classID!=-1)
        {
            $data=array(
                'activity_id'=>$activityID,
                'class_id'=>$classID,
            );
            if($this->create($data))
            {
                $this->add();
                return true;
            }
            else
                return false;
        }
        else
        {
            return false;
        }
    }
}
?>