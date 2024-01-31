@php
    $items = [
            ['title' => 'Browser Icons', 'description' => 'by Marina D'],
            ['title' => 'Bootstrap', 'description' => 'by @mdo and @fat'],
            ['title' => 'Bootstrap Color Picker', 'description' => 'by Javi Aguilar'],
            ['title' => 'Bootstrap Date Range', 'description' => 'by Dan Grossman'],
            ['title' => 'Bootstrap Social Button', 'description' => 'by Panayiotis Lipiridis'],
            ['title' => 'Bootstrap Tags Input', 'description' => 'by @hackerb9'],
            ['title' => 'Timepicker', 'description' => 'by @jdewit'],
            ['title' => 'Chocolat', 'description' => 'by @nicolas-t'],
            ['title' => 'Cleave.JS', 'description' => 'by @nosir'],
            ['title' => 'Codemirror', 'description' => 'by Marijn Haverbeke'],
            ['title' => 'DataTables', 'description' => 'by @datatables'],
            ['title' => 'Dropzone.JS', 'description' => 'by Matias Meno'],
            ['title' => 'Flag Icon CSS', 'description' => 'by Panayiotis Lipiridis'],
            ['title' => 'Font Awesome', 'description' => 'by @fontawesome'],
            ['title' => 'Full Calendar', 'description' => 'by Adam Shaw'],
            ['title' => 'IonIcons', 'description' => 'by Ionic Framework'],
            ['title' => 'jQuery', 'description' => 'by The jQuery Foundation'],
            ['title' => 'jQuery PWStrength', 'description' => 'by Mato Ilic'],
            ['title' => 'jQuery Selectric', 'description' => 'by Leonardo Santos'],
            ['title' => 'jQuery UI', 'description' => 'by The jQuery Foundation'],
            ['title' => 'jQuery Vector Map', 'description' => 'by Manifest Interactive'],
            ['title' => 'NiceScroll', 'description' => 'by InuYaksa'],
            ['title' => 'OwlCarousel', 'description' => 'by David Deutsch'],
            ['title' => 'Prism', 'description' => 'by @PrismJS'],
            ['title' => 'Select2', 'description' => 'by Kevin Brown and Igor Vaynberg'],
            ['title' => 'Simple Weather', 'description' => 'by James Fleeting'],
            ['title' => 'Summernote', 'description' => 'by Alan Hong'],
            ['title' => 'Sweet Alert', 'description' => 'by Tristan Edwards'],
            ['title' => 'iziToast', 'description' => 'by Dolce'],
            ['title' => 'Upload Preview', 'description' => 'by Opoloo'],
            ['title' => 'Weather Icon', 'description' => 'by Erik Flowers'],
            ['title' => 'Chart.JS', 'description' => 'by Nick Downie'],
            ['title' => 'GMaps.JS', 'description' => 'by Gustavo Leon'],
            ['title' => 'Sparkline', 'description' => 'by Gareth Watts'],
            ['title' => 'Moment', 'description' => 'by @moment'],
            ['title' => 'Popper.JS', 'description' => 'by Federico Zivolo'],
            ['title' => 'Tooltip.JS', 'description' => 'by Federico Zivolo'],
    ]
@endphp

<x-app-layout>
    <x-section.section>
        <x-section.header-section title="Credits"/>
        <x-section.body-section>
            <x-section.title-section title="{{ __('Thanks To ...') }}"
                                     description="Change information about yourself on this page."/>
            <x-card.child-card>
                <x-card.header-card title="Credits" :color="false"/>
                <x-card.body-card>
                    <x-list.media-list class="mt-4" :items="$items"/>
                </x-card.body-card>
            </x-card.child-card>
        </x-section.body-section>
    </x-section.section>
</x-app-layout>
