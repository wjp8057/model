<?php
// +----------------------------------------------------------------------
// |  [ MAKE YOUR WORK EASIER]
// +----------------------------------------------------------------------
// | Copyright (c) 2003-2016 http://www.nbcc.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: fangrenfu <fangrenfu@126.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\common\access\MyAccess;
use app\common\access\MyController;
use app\common\service\Course;

class Course extends MyController
{
    //显示信息
    public function query($page = 1, $rows = 20)
    {
        $result = null;
        try {
            $obj =  new Course();
            $result = $obj->getList($page, $rows);

        } catch (\Exception $e) {
            MyAccess::throwException($e->getCode(), $e->getMessage());
        }
        return json($result);
    }

    //更新信息
    public function update()
    {
        $result = null;
        try {
            $obj =  new Course();
            $result = $obj->update($_POST);

        } catch (\Exception $e) {
            MyAccess::throwException($e->getCode(), $e->getMessage());
        }
        return json($result);
    }
} 