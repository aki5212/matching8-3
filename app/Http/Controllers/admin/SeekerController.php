<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeekerPostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Seeker;
use App\Models\Employer;
use App\Models\Category;

class SeekerController extends Controller
{
    public function index(): Response
    {
        // 求職一覧を取得
        $seekers = Seeker::with('category')
                    ->orderBy('category_id')
                    ->orderBy('title')
                    ->get();

        return response()
                ->view('admin/seeker/index', ['seekers' => $seekers])
                ->header('Content-Type', 'text/html')
                ->header('Content-Encoding', 'UTF-8');
    }

    public function show(string $id): View
    {
        // 書籍を一件取得
        $seeker = Seeker::findOrFail($id);

        // 取得した求職をレスポンスとして返す
        return view('admin/seeker/show', compact('seeker'));
    }

    public function create(): View
    {
        // ビューにカテゴリ一覧を表示するために全件取得
        $categories = Category::all();

        // 求人一覧を表示するために全件取得
        $employers = Employer::all();

        // ビューオブジェクトを返す
        return view('admin/seeker/create',
            compact('categories', 'employers'));
    }

    public function store(SeekerPostRequest $request): RedirectResponse
    {
        // 求職データ登録用のオブジェクトを作成する
        $seeker = new Seeker();

        // リクエストオブジェクトからパラメータを取得
        $seeker->category_id = $request->category_id;
        $seeker->title = $request->title;
        $seeker->price = $request->price;

        // 保存
        $seeker->save();

        // 登録完了後seeker.indexにリダイレクトする
        return redirect(route('seeker.index'))
        ->with('message', $seeker->title . 'を追加しました。');
    }
}
