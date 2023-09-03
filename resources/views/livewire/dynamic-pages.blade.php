<div>
    @section('title', $page->title)

    <section class="w-full pb-6">
        @isset($section)
            <x-section :section="$section" />
        @endisset
        <div class="flex flex-col justify-center mt-4 bg-white">
            <h1 class="uppercase block my-4">{{ $page->title }}</h1>

            <article class="prose-2xl sm:prose-lg md:prose-xl lg:prose-2xl xl:prose-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <livewire:editor-js editor-id="myEditor" :value="$content" :read-only="true" />
            </article>

            @isset($cardContent)
                <div class="w-full mx-auto py-4 px-4">
                    @foreach ($cardContent as $parentIndex => $item)
                        <div class="divide-y-2 px-6 py-4" wire:key="cardItems-{{ $parentIndex }}">
                            <H3 class="my-4 text-center text-gray-800">
                                {{ $item['title'] }}
                            </H3>
                            <div class="grid grid-cols-1 xl:grid-cols-4 md:grid-cols-2 justify-center gap-2">
                                @foreach ($item['data'] as $nestedIndex => $content)
                                    <x-card-content :content="$content" />
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endisset
        </div>

        @if ($this->type->value === 'contact')
            <div class="p-10">
                <livewire:contact-form lazy />
            </div>
        @endif
    </section>
</div>
