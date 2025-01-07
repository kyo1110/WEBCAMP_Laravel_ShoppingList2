
    @extends('admin.layout')

    {{-- メインコンテンツ --}}
    @section('contents')
        <h1>ユーザー覧</h1>
        <table border="1">
            <tr>
                <th>ユーザID 
                <th>ユーザ名 
                <th>購入した「買うもの」件数
            @foreach ($users as $user)
            
            <tr>
                <td>{{ $user->id }}
                <td>{{ $user->name }}
                <td>{{ $user->shopping_lists_num }}
            @endforeach
        </table>
    @endsection
 