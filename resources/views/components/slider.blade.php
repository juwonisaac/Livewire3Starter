@props(['sections'])
<section>
    <div class="relative overflow-hidden h-auto">
        @foreach ($sections as $index => $section)
            <div class="flex items-center justify-center w-full relative py-12 px-6"
                style="background-color:{{ $section->bg_color }}">
                <img src="{{ asset('images/section/' . $section->image) }}"
                    class="block absolute inset-0 w-full h-full object-cover object-center z-0"
                    onerror="this.onerror=null;this.remove();">
                <div class="absolute bottom-0 w-full h-1/2 z-0 bg-gradient-to-t from-black to-transparent"></div>
                <div class="flex flex-col items-center mx-auto my-auto text-center relative z-10 xl:px-24 sm:px-6">
                    <div class="my-4 font-bold text-xl text-white leading-[0.95] lg:text-5xl">
                        {{ $section->title }}
                    </div>
                    <div class="mb-4 text-3xl md:text-4xl font-heading font-bold text-white leading-normal lg:text-sm">
                        {{ $section->subtitle }}
                    </div>
                    <p class="pb-10 text-md text-white leading-normal lg:text-sm lg:pt-0">
                        {!! $section->description !!}
                    </p>
                    @if ($section->link)
                        <a href="{{ $section->link }}"
                            class="uppercase bg-blue-600 text-white inline-flex px-12 py-2 justify-center items-center text-sm font-oswald tracking-wider outline-none transition-colors hover:bg-blue-800">
                            {{ $section->label }}
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>
