<?php
    class ActivityClassModel extends Model
    {
        
        /*
         * 作者:xie
         * 日期：2013.1.29
         * 功能：返回热门标签
         * 输入：限制数量
         * 返回：二维数组，包括标签名和id
         */
        public function getHeatClass($limit=5)
        {
            return $this->order('heat desc')->limit($limit)->field('class_name,id')->select();
        }

        /**在标签表里面增加标签，自动去掉重复,重复的增加热度
         * @param $className
         * @return classID,
         *          -1 if failed
         * @version 2013.2.6
         * @author xie
         */
        public function addClass($className)
        {
            $classID=$this->getFieldByClassName($className,'id');
            if($classID !=null )
            {
                $this->where(array('id'=>$classID))->setInc('heat',1);
                return $classID;
            }
            else
            {
                $data=array(
                    'class_name'=>$className,
                );
                if($this->create($data))
                {
                    $this->add();
                    return $this->getFieldByClassName($className,'id');
                }
                else
                {
                    return -1;
                }
            }
        }
    }