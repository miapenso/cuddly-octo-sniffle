<?php

namespace Miapenso\News\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Routing\Controller;
use Miapenso\News\Model\News;

class NewsController extends Controller
{
    use ModelForm;
    protected $header;
    public function __construct()
    {
        $this->header = '新闻管理';
    }

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index(Content $content)
    {
        $content->header( $this->header );
        $content->description('列表');
        $content->body($this->grid());
        return $content;
    }

    public function show($id,Content $content){

        $content->header( $this->header );
        $content->description('详情');
//        $content->body(Admin::show(News::find($id), function (Show $show) {
//            $show->id('编号');
//        }));
        $content->body('新闻详情');
        return $content;
    }


    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id,Content $content)
    {
        $content->header( $this->header );
        $content->description('编辑');
        $content->body($this->form()->edit($id));

        return $content;
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create(Content $content)
    {
        $content->header( $this->header );
        $content->description('新建');
        $content->body($this->form());
        return $content;
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        $grid = new Grid(new News());
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('name', '新闻标题');
            $filter->equal('status','使用状态')->select(['1' => '启用','1'=>'禁用']);
        });
        $grid->actions(function ($actions) {
            $actions->disableView();
        });

        $grid->model()->orderBy('sort','desc')->orderBy('id','asc');

        $grid->disableExport();
        $grid->name('新闻标题');
        $grid->created_at('创建时间')->display(function($time) {
            return date('Y-m-d',$time);
        });

        return $grid;

    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new News());

        $form->tools(function (Form\Tools $tools) {
            $tools->disableView();
        });
        $form->hidden('id');

        $form->text('name','新闻标题')->rules('required',[
            'required'=>'请输入新闻标题'
        ]);
        $form->ignore(['updated_at', 'create_at']);

        return $form;
    }

}
