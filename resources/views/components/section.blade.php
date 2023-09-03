@props(['section'])

<div style="background-color:{{ $section->bg_color }}" class="w-full mx-auto my-auto h-screen flex flex-items-center relative overflow-hidden">
    <img src="{{ asset('images/sections/' . $section->image) }}"
        class="block absolute inset-0 w-full h-full object-cover object-center z-0"
        onerror="this.onerror=null;this.remove();">
    <div class="absolute inset-0 opacity-40 z-0"
        style="{{ $section->image ? 'mix-blend-mode: multiply;background-color:'.$section->bg_color : '' }}"></div>

    <div class="flex flex-col items-center mx-auto my-auto text-center relative z-10 xl:px-24 sm:px-6">
        <div class="my-4 font-bold text-xl text-white leading-[0.95] lg:text-5xl"
            style="text-shadow: 2px 2px 4px rgba(68, 68, 68, 0.5);">
            {{ $section->title }}
        </div>
        <div class="mb-4 text-3xl md:text-4xl font-heading font-bold text-white leading-normal lg:text-sm"
            style="text-shadow: 2px 2px 4px rgba(68, 68, 68, 0.5);">
            {{ $section->subtitle }}
        </div>
        <p class="pb-10 text-md text-white leading-normal lg:text-sm lg:pt-0"
            style="text-shadow: 2px 2px 4px rgba(68, 68, 68, 0.5);">
            {!! $section->description !!}
        </p>
        @if ($section->link)
            <a href="{{ $section->link }}"
                x-on:click="$dispatch('container-toggle', { sectionId: '{{ $section->link }}' })"
                class="uppercase bg-blue-600 text-white inline-flex px-12 py-2 justify-center items-center text-sm font-oswald tracking-wider outline-none transition-colors hover:bg-blue-800">
                {{ $section->label }}
            </a>
        @endif
    </div>
</div>
