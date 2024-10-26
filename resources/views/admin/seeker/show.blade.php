<x-layouts.seeker-manager>
    <x-slot:title>
        求職詳細
    </x-slot:title>
    <h1>求職詳細</h1>
    <ul>
        <li>ID：{{ $seeker->id }}</li>
        <li>業務内容：{{ $seeker->category->title }}</li>
        <li>コメント：{{ $seeker->title }}</li>
        <li>価格：{{ $seeker->price }}</li>
        <li>求人：
            <ul>
                @foreach ($seeker->employers as $employer)
                    <li>{{ $employer->name }}</li>
                @endforeach
            </ul>
        </li>
    </ul>
    <a href="{{ route('seeker.index') }}">戻る</a>
</x-layouts.seeker-manager>
