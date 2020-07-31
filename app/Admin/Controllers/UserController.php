<?php

namespace App\Admin\Controllers;

use App\Model\PuserModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PuserModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PuserModel());

        $grid->column('user_id', __('User id'));
        $grid->column('user_name', __('User name'));
//        $grid->column('user_pwd', __('User pwd'));
        $grid->column('user_email', __('User email'));
        $grid->column('user_time', __('User time'))->date('Y-m-d H:i:s');

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
        $show = new Show(PuserModel::findOrFail($id));

        $show->field('user_id', __('User id'));
        $show->field('user_name', __('User name'));
        $show->field('user_pwd', __('User pwd'));
        $show->field('user_email', __('User email'));
        $show->field('user_time', __('User time'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PuserModel());

        $form->text('user_name', __('User name'));
        $form->text('user_pwd', __('User pwd'));
        $form->text('user_email', __('User email'));
        $form->number('user_time', __('User time'));

        return $form;
    }
}
