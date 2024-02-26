<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div class="text-gray-600">

            @if ($this->activeCategory)
                <x-badge wire:navigate href="{{ route('posts.index', ['category' => $this->activeCategory->slug]) }}"
                    :textColor="$this->activeCategory->text_color" :bgColor="$this->activeCategory->bg_color">{{ $this->activeCategory->title }}</x-badge>
            @endif
            @if ($search)
                <span>
                    containing : <strong>{{ $search }}</strong>
                </span>
            @endif
            @if ($this->activeCategory || $search)
                <button
                    class="gray-800 font-extrabold ml-5 bg-red-300 p-2 rounded-xl antialiased hover:subpixel-antialiased"
                    wire:click='clearFilters()'>Clear</button>
            @endif

        </div>
        <div id="filter-selector" class="flex items-center space-x-4 font-light ">
            <button class="{{ $sort === 'desc' ? 'text-gray-900 border-gray-700 border-b' : 'text-gray-500' }} py-4"
                wire:click="setSort('desc')">Latest</button>
            <button class="{{ $sort === 'asc' ? 'text-gray-900 border-gray-700 border-b' : 'text-gray-500' }} py-4"
                wire:click="setSort('asc')"">Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-posts.post-item :post="$post" />
        @endforeach
    </div>
    <div class="my-3 m-auto">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>
