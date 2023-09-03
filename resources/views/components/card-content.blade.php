@props(['content'])
<div class="py-10 w-full px-4 text-center bg-white">
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
        <div class="px-4 py-5 flex-auto">
            <div
                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                <i class="{{ $content['cardIcon'] ?? '' }}"></i>
            </div>
            <h3 class="text-xl font-semibold text-center">{{ $content['cardTitle'] }}</h3>
            <p class="mt-2 mb-4 text-blueGray-500">
                {{ $content['cardText'] }}
            </p>
        </div>
    </div>
</div>
