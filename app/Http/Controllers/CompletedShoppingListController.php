<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CompletedShoppingList as CompletedShoppingListModel;

class CompletedShoppingListController extends Controller
{
    /**
     * タスク一覧ページ を表示する
     * 
     * @return \Illuminate\View\View
     */
    public function list()
    {
        
        // 1Page辺りの表示アイテム数を設定
        $per_page = 3;
        
        // 一覧の取得
        $list = $this->getListBuilder()
                     ->paginate($per_page);
                        // ->get();
        /*
        $sql =  $this->getListBuilder()
            ->toSql();
        //echo "<pre>\n"; var_dump($sql, $list); exit;
        var_dump($sql);
        */
        
        return view('completed_shopping_list.list', ['list' => $list]);
    }
    
    /**
     * 一覧用の Illuminate\Database\Eloquent\Builder インスタンスの取得
     */
    protected function getListBuilder()
    {
        return CompletedShoppingListModel::where('user_id', Auth::id())
        ->orderBy('name')
        ->orderBy('created_at');
    }
    
    /**
     * 「単一のタスク」Modelの取得
     */
    protected function getTaskModel($shopping_list_id)
    {
        // task_idのレコードを取得する
        $shopping_list = CompletedShoppingListModel::find($shopping_list_id);
        if ($shopping_list === null) {
            return null;
        }
        // 本人以外のタスクならNGとする
        if ($shopping_list->user_id !== Auth::id()) {
            return null;
        }
        
        return $shopping_list;
    }

    /**
     * 「単一のタスク」の表示
     */
    protected function singleTaskRender($shopping_list_id, $template_name)
    {
        // task_idのレコードを取得する
        $shopping_list = $this->getTaskModel($shopping_list_id);
        if ($shopping_list === null) {
            return redirect('/shopping_list/list');
        }

        // テンプレートに「取得したレコード」の情報を渡す
        return view($template_name, ['shopping_list' => $shopping_list]);
    }

    
    
      

}