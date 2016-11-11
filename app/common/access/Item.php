<?php
// +----------------------------------------------------------------------
// |  [ MAKE YOUR WORK EASIER]
// +----------------------------------------------------------------------
// | Copyright (c) 2003-2016 http://www.nbcc.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: fangrenfu <fangrenfu@126.com> 2016/6/19 10:20
// +----------------------------------------------------------------------

namespace app\common\access;

use think\Db;
use think\Exception;

/**获取各种对象的关键属性
 * Class Item
 * @package app\common\access
 */
class Item {


    /**根据课号获取课程
     * @param string $id
     * @param bool $alert
     * @return null
     * @throws Exception
     * @throws \think\exception\DbException
     */
    public static function getCourseItem($id,$alert=true){
        $result=null;
        $condition=null;
        $condition['id']=$id;
        $data=Db::table('courses')->where($condition)->field('rtrim(name) as name,id')->select();
        if(!is_array($data)||count($data)!=1) {
            if($alert)
                throw new Exception('id:' . $id, MyException::ITEM_NOT_EXISTS);
        }
        else
            $result=$data[0];
        return $result;
    }
}