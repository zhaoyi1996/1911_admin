<?php

namespace App\Admin\Controllers;

use App\Model\GoodsModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Model\CateModel;
class GoodsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GoodsModel());
        $grid->model()->orderBy('goods_id','desc');
        $grid->column('goods_id', __('Goods id'));
        $grid->column('cat_id', __('Cat id'));
        $grid->column('goods_sn', __('Goods sn'));
        $grid->column('goods_name', __('Goods name'));
        $grid->column('click_count', __('Click count'));
        $grid->column('goods_number', __('Goods number'));
        $grid->column('shop_price', __('Shop price'));
//        $grid->column('keywords', __('Keywords'));
//        $grid->column('goods_desc', __('Goods desc'));
        $grid->column('goods_img', __('Goods img'))->image();
//        $grid->column('add_time', __('Add time'));
        $grid->column('is_delete', __('Is delete'));
        $grid->column('sale_num', __('Sale num'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(GoodsModel::findOrFail($id));

        $show->field('goods_id', __('Goods id'));
        $show->field('cat_id', __('Cat id'));
        $show->field('goods_sn', __('Goods sn'));
        $show->field('goods_name', __('Goods name'));
        $show->field('click_count', __('Click count'));
        $show->field('goods_number', __('Goods number'));
        $show->field('shop_price', __('Shop price'));
        $show->field('keywords', __('Keywords'));
        $show->ckeditor('goods_desc', __('Goods desc'));
        $show->field('goods_img', __('Goods img'));
        $show->field('add_time', __('Add time'));
        $show->field('is_delete', __('Is delete'));
        $show->field('sale_num', __('Sale num'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        //
        $form = new Form(new GoodsModel());

        $form->select('cat_id', __('分类'))->options(CateModel::selectOptions());
        $form->text('goods_sn', __('商品编号'));
        $form->text('goods_name', __('商品名称'));
        $form->number('click_count', __('点击数量'));
        $form->number('goods_number', __('商品数量'));
        $form->decimal('shop_price', __('商品价格'))->default(0.00);
        $form->text('keywords', __('关键字'));
        $form->ckeditor('goods_desc', __('商品介绍'));
        $form->file('goods_img', __('商品图片'));
        $form->number('add_time', __('添加时间'));
        $form->switch('is_delete', __('是否删除'));
        $form->number('sale_num', __('售卖数量'));
        return $form;
    }
}
