<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ログイン機能付きタスク管理サービス 管理画面 @yield('title')</title>
    </head>
    <body>
    @auth('admin')
        <menu label="リンク">
        <a href="/admin/top">管理画面Top</a><br>
        <a href="/admin/user/list">ユーザ一覧</a><br>
        <a href="/admin/logout">ログアウト</a><br>
        </menu>
    @endauth
        @yield('contents')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
    </body>
</html>