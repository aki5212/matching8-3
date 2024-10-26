<x-layouts.add>
    @if (Auth::user()->isAdmin())
        <p>管理者用ダッシュボード</p>
    @elseif (Auth::user()->isEmployer())
        <p>求人者用ダッシュボード</p>
    @elseif (Auth::user()->isJobSeeker())
        <p>求職者用ダッシュボード</p>
    @else
        <p>役割が設定されていません。</p>
    @endif
</x-layouts.add>
