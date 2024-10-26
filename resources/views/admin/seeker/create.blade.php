<x-layouts.seeker-manager>
        <x-slot:title>
            求職登録
        </x-slot:title>
        <h1>求職登録</h1>
        @if ($errors->any())
        <x-alert class="danger">
            <x-error-messages :$errors />
        </x-alert>
        @endif
        <form action="{{ route('seeker.store') }}" method="POST">
            @csrf
            <div>
                <label>業務内容</label>
                <select name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                        @selected($category->id == old('category_id'))>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>コメント</label>
                <input type="text" name="title"
                    value="{{ old('title') }}">
            </div>
            <div>
                <label>価格</label>
                <input type="text" name="price"
                    value="{{ old('price') }}">
            </div>
            <input type="submit" value="送信">
        </form>
</x-layouts.seeker-manager>
