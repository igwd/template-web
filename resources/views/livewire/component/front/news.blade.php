@extends('layouts.base')
@section('body')
    <div class=" min-h-screen">
        <style>
            .container-sub {
                margin-top: 112px;
            }

            .container-news {
                max-height: 550px;
            }
        </style>
        <div class="flex flex-col min-h-screen bg-white dark:bg-gray-700">
            @livewire('component.front.navbar')
            <div
                class="container-sub text-gray-500 p-5 pb-5 text-center grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 gap-0 md:gap-4">
                <div class="col-span-2">
                    <div class="h-full p-5 flex flex-col rounded-lg shadow bg-white dark:bg-gray-800">

                        <h1 class=" text-2xl text-gray-900 dark:text-white font-bold">
                            Penyerahan Ijin Program Studi Program Profesi Insinyur (PS.PPI) Universitas Warmadewa
                        </h1>
                        <span class="font-bold text-base text-gray-500 truncate dark:text-gray-400 mt-3">
                            4 hari yang lalu
                        </span>

                        <figure class="card-zoom-news">
                            <img class="card-zoom-image w-full rounded-lg over:scale-110 transition duration-500 object-cover"
                                src="{{ asset('img/logo-merdeka.png') }}" alt="">
                        </figure>
                        <p class=" text-justify mt-3">Lorem ipsum, dolor sit amet consectetur
                            adipisicing elit. Commodi,
                            ducimus voluptate. Iste
                            consequatur accusantium hic repellendus laboriosam. Illum saepe soluta minus aspernatur,
                            dicta vel quibusdam totam consectetur distinctio inventore. Esse veniam, facere quae sunt
                            laborum sapiente fugit in itaque, possimus explicabo repellat temporibus cum. Nulla quisquam
                            expedita quam reiciendis quaerat ex voluptate, accusamus aperiam illum unde doloremque
                            consequuntur. Dolor corrupti rerum adipisci eaque ex necessitatibus, tenetur quo tempora
                            omnis numquam ipsam, autem labore aut? Rem quisquam, accusamus a libero illo fuga error in
                            doloremque nam eum maiores, repellat excepturi. Reiciendis officia laudantium illum neque
                            placeat fuga repellat dignissimos totam, doloribus eveniet at quae magnam ducimus
                            perspiciatis eum harum. Consequuntur autem fuga maiores cumque. Sint cupiditate officia
                            ipsam voluptate optio? Reprehenderit similique, corporis magni unde minima et possimus, quae
                            laboriosam porro dolore ullam quam esse? Omnis odio reprehenderit, natus laudantium porro
                            necessitatibus, dignissimos ea facere quibusdam minus dolores voluptates atque corrupti
                            fugit veniam a in architecto minima repudiandae laboriosam asperiores placeat explicabo?
                            Illum laborum ratione eligendi dicta praesentium, explicabo sapiente quidem? Aliquam
                            suscipit tempora cum quia optio libero voluptate ratione magni blanditiis nemo, quis eum
                            necessitatibus quos aliquid? Sit asperiores, cumque quia excepturi molestias commodi
                            explicabo, nam error molestiae veritatis ea repellendus sunt possimus, harum natus nemo
                            reprehenderit nostrum eveniet dolorum! Laboriosam corrupti possimus tenetur numquam
                            distinctio. Nihil culpa aliquid repellendus quod aliquam officia, tempore modi similique
                            architecto perferendis placeat labore mollitia pariatur esse voluptatem! Tenetur rerum magni
                            provident sit, commodi temporibus ut a neque consequatur. Praesentium reprehenderit est
                            aliquam quia nostrum totam? Quaerat nostrum pariatur, illum odio neque provident cupiditate
                            dolorem error animi excepturi blanditiis doloribus ipsam nihil. Voluptate culpa iusto nemo
                            omnis rerum modi doloribus, est ipsa repellat ullam sed facilis voluptatem alias molestiae
                            reprehenderit officiis necessitatibus, odit ratione tenetur deserunt. Dignissimos quidem
                            nisi quasi deleniti aperiam eveniet, asperiores magni aliquid omnis necessitatibus
                            repudiandae voluptates ab nostrum doloremque magnam culpa quam voluptatum neque dicta, ad
                            illo in architecto quos. Velit mollitia laborum odio sequi iste debitis odit voluptate
                            perspiciatis ipsa totam placeat quidem, voluptatem deserunt. Cum facere hic corrupti alias
                            consequuntur tempora quasi nam aut adipisci officiis error repudiandae obcaecati magnam sunt
                            saepe harum at dolore facilis, optio vitae, quisquam omnis, ea doloribus. Dicta a vero
                            voluptatibus modi qui placeat animi labore repellendus, ipsum veritatis fugiat quaerat
                            temporibus tenetur deserunt, aliquam, nihil inventore reprehenderit hic illum? Dolor
                            reiciendis nesciunt enim dolorum. Sequi neque sint eaque impedit, dolorum praesentium
                            temporibus nulla facere sit autem. Itaque illo et voluptas! Enim aliquid repellendus ea
                            similique veniam omnis velit consectetur. Iure architecto excepturi tempora dolorem eius
                            commodi. Porro soluta sapiente a, quo voluptates consequuntur officiis dolores ea
                            blanditiis, eligendi dolor ab? Eaque quis commodi tempora fuga ullam dolor aperiam soluta
                            saepe eos placeat, porro sint dolores ex cumque, sunt nesciunt sapiente sed nulla nemo quia
                            aliquam vitae voluptates numquam. Odio voluptatem alias aliquam! Illo itaque ea autem
                            aperiam asperiores? Cumque saepe eligendi itaque corporis, voluptates sunt architecto
                            laboriosam ipsam eveniet cum quis, iusto impedit qui. Ut, iusto omnis fugit culpa
                            exercitationem tempore inventore?</p>

                    </div>

                </div>
                <div class="container-news mt-4 md:mt-0">
                    @livewire('component.front.news.news-update')
                </div>
            </div>
            @livewire('component.front.footer.footer-base')
        </div>
    </div>
@endsection
