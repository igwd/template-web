<div>
    <style>
        .container-video-mars {
            width: 100%;
            height: 50vh;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            gap: 20px;
        }

        .lyrics-container {
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        .lyrics {
            font-size: 24px;
            padding: 10px;
            animation: scroll 50s linear infinite;
        }

        @keyframes scroll {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-100%);
            }
        }
    </style>
    <div class="container-video-mars ">
        <div class=" h-full">
            <video class="w-full h-full max-w-full border border-gray-200 rounded-lg dark:border-gray-700" controls>
                <source type="video/mp4" src="{{ asset('video/mars-teknik.mp4') }}#t=2">
            </video>
        </div>
        <div class="lyrics-container dark:bg-bg-dark border rounded-md">
            <div class="lyrics font-dancing dark:text-white text-lg flex flex-col gap-10 text-center">
                <h1 class="text-2xl font-lobster mt-20">Mars Teknik Warmadewa </h1>
                <p>Berjuang menggapai cita</p>
                <p>Berkarya Membangun bangsa</p>
                <p>Bersama satu tujuan</p>
                <p>Teknik Warmadewa</p>
                <p class=" mt-52">Kuatkan Kebersamaan</p>
                <p>Dan Percaya Kita Pasti Bisa</p>
                <p>Semangat Pantang Menyerah</p>
                <p>Teknik Satu Jaya</p>
            </div>
        </div>
    </div>

</div>
