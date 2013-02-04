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
    }