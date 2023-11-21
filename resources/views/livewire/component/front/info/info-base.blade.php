<div>
    <style>
        .container-info {
            width: 100%;
            height: 70vh;
            padding: 10px 0;
        }
    </style>
    <section id="info" class="container-info bg-cover flex bg-center bg-no-repeat bg-gray-700 bg-blend-multiply"
        style="background-image:url('{{ asset($infobase['background']) }}')">
        <div class="w-2/5 h-full text-white p-5 text-center flex items-center flex-col justify-center" data-aos="fade-up"
            data-aos-anchor-placement="center-bottom">
            <h1 class="text-2xl md:text-4xl font-lobster">{{ $infobase['heading_1'] }}</h1>
            <p class="m-5 text-xl font-dancing">{{ $infobase['heading_2'] }}</p>
        </div>
        <div class="w-3/5 h-full grid grid-cols-2 items-center justify-center bt " data-aos="fade-up">
            @foreach ($infobase['sections'] as $section)
                <div
                    class="pl-2 border-b-2 border-r-2 border-gray-200 hover:bg-white w-full h-full flex items-center text-white hover:text-gray-900">
                    @if ($section['icon'])
                        <img class="w-10 h-10 mr-4 dark:white"
                            src="{{ Storage::disk('infobase')->url($section['icon']) }}" />
                    @else
                        {!! $section['svg'] !!}
                    @endif
                    <a href="<?= $section['external_link'] ? $section['external_link'] : $section['link'] ?>"
                        <?= $section['external_link'] ? "target='_blank'" : '' ?>
                        class="text-sm md:text-xl duration-300 font-poppins">{{ $section['description'] }}</a>
                </div>
            @endforeach
        </div>
    </section>
</div>
