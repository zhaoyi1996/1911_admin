<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\ModelTree;
class CateModel extends Model
{
    use ModelTree;
    public $table="p_category";
    public $primaryKey="cat_id";
    public $timestamps=false;
    //设置三个字段  parent_id  order    title
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');        //父级分类
        $this->setOrderColumn('sort_order');        //排序字段
        $this->setTitleColumn('cat_name');
    }
}
