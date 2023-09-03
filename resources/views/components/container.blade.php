@props(['link'])

<div x-data="{ containerVisible: false, sectionId: '{{ $link }}' }"
     x-init="
         $watch('containerVisible', (value) => {
             if (value) {
                 const container = document.getElementById('container');
                 container.id = sectionId.replace('#', '');
                 scrollToSection(sectionId);
             }
         });

         function scrollToSection(sectionId) {
             const section = document.getElementById(sectionId.replace('#', ''));
             if (section) {
                 section.scrollIntoView({
                     behavior: 'smooth'
                 });
             }
         }
     "
     x-show="containerVisible"
     x-on:container-toggle.window="containerVisible = !containerVisible"
     >
    <div id="container" class="text-center max-w-7xl sm:mx-4 md:mx-6 lg:mx-10 shadow-sm sm:rounded-lg px-10 pb-10">
        {{ $slot }}
    </div>
</div>
