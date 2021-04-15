<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;

use App\Models\Mail;

class MailTestingController extends Controller
{
    public function index(Content $content)
    {
        return Admin::content(function (Content $content) {
            $content->header('電子郵件');
            $content->description('列表');
            $content->body($this->grid());
        });

    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('電子郵件');
            $content->description('編輯');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('電子郵件');
            $content->description('新增');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Mail::class, function (Grid $grid) {

            $grid->disableFilter();
            $grid->disableExport();
            $grid->disableRowSelector();

            $grid->id('編號');
            $grid->from('寄件人姓名');
            $grid->to('收件人電郵');
            $grid->subject('主旨');
            $grid->content('內容');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Mail::class, function (Form $form) {

            $form->tools(function (Form\Tools $tools) {
                $tools->disableList();            
            });
            
            $form->footer(function ($footer) {
                $footer->disableViewCheck();
                $footer->disableEditingCheck();
                $footer->disableCreatingCheck();           
            });
            
            $form->text('from', "寄件人姓名")->rules('required');
            $form->email('to', "收件人電郵")->rules('required');
            $form->text('subject', "主旨")->rules('required');
            $form->textarea('content', "內容")->rows(10);
        });
    }

    public function store()
    {
        return $this->form()->store();
    }
}