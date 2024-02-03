<!DOCTYPE html/>

<html lang="en" style="scroll-behavior: smooth;">
  <head>
    <title>Selamat Datang di Fisheries</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body style="background-color: #FCFCFC;" class="font-sans">
    <div class="my-nav w-screen px-8 py-5 fixed top-0 z-50">
      <div class="w-full rounded-2xl bg-white/50 shadow-lg ring-1 ring-black/10 backdrop-blur-sm px-7 py-2">
        <div class="flex justify-between items-center">
          <img src="assets/fisheries.png" class="w-10 h-10"/>
          <ul class="navigation">
            <li class="float-left px-7">
              <a class="text-gray-700 font-semibold" href="#gabung">
                Gabung
              </a>
            </li>
            <li class="float-left px-7">
              <a class="text-gray-700 font-semibold" href="#keunggulan">
                Keunggulan
              </a>
            </li>
            <li class="float-left px-7">
              <a class="text-gray-700 font-semibold" href="#unduh">
                Unduh
              </a>
            </li>
            <li class="float-left px-7">
              <a class="text-gray-700 font-semibold" href="#tentang">
                Tentang
              </a>
            </li>
          </ul>
          <ul>
            <li>
              <a class="text-gray-700 font-semibold" href="{{ route('show-login') }}">
                Login
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div id="gabung" class="flex justify-end items-center">
      <div class="h-full w-1/2 flex flex-col pl-14">
        <h1 class="w-9/12 text-gray-700 font-bold text-5xl mb-4">Tingkatkan Produksi Ikan Kering Anda Sekarang</h1>
        <p class="w-8/12 text-gray-700 font-light text-xl mt-10">Fisheries adalah sebuah perangkat IoT terintegrasi untuk mempermudah proses pengeringan ikan</p>
        <div class="w-5/12 py-2 mt-7">
          <a style="background-color: #6BC9D1;" class="w-3/12 px-4 py-3 text-white rounded-2xl shadow-lg ring-black/20 text-2xl">
            Gabung Sekarang
          </a>
        </div>
      </div>
      <img src="assets/top_image.svg" class="w-1/2"/>
    </div>

    <div id="keunggulan" class="relative h-8/12 w-screen">
      <img src="assets/Polygon 2.png" class="absolute top-0 left-0 -z-10"/>
      <div class="ctnt w-screen flex flex-col items-center pt-10">
        <h1 class="text-gray-700 font-bold text-5xl mt-10">Keunggulan Fisheries</h1>
        <p class="w-8/12 text-center mt-5 text-gray-700 font-light text-xl">Fisheries menawarkan produk untuk memecahkan permasalahan dalam proses pengeringan ikan. Hal ini bertujuan untuk meningkatkan efisiensi dan produktifitas</p>
        <div class="list-card mt-10 w-screen px-6 pt-10">
          <div class="flex justify-center">
            <div class="h-7/12 w-4/12 bg-white shadow-xl ring-black/20 px-7 py-14 rounded-3xl">
              <div class="flex flex-col items-center">
                <img src="assets/Bolt.svg" class="w-15 h-15"/>
                <h1 class="text-gray-700 font-bold text-5xl mt-5 mb-3 text-center">Performa Cepat</h1>
                <p class="w-15 text-center mt-3 text-gray-700 font-light text-xl">Perangkat terintegrasi fisheries menawarkan performa yang cepat dan stabil</p>
              </div>
            </div>
            <div class="h-7/12 w-4/12 bg-white shadow-xl ring-black/20 px-7 py-14 rounded-3xl mx-10">
              <div class="flex flex-col items-center">
                <img src="assets/Smile.svg" class="w-15 h-15"/>
                <h1 class="text-gray-700 font-bold text-5xl mt-5 mb-3 text-center">Mudah Digunakan</h1>
                <p class="w-15 text-center mt-3 text-gray-700 font-light text-xl">
                  Perangkat dan aplikasi Fisheries sangat mudah untuk digunakan dan dioperasikan
                </p>
              </div>
            </div>
            <div class="h-7/12 w-4/12 bg-white shadow-xl ring-black/20 px-7 py-14 rounded-3xl">
              <div class="flex flex-col items-center">
                <img src="assets/Save.svg" class="w-15 h-15"/>
                <h1 class="text-gray-700 font-bold text-5xl mt-5 mb-3 text-center">Murah dan Efisien</h1>
                <p class="w-15 text-center mt-3 text-gray-700 font-light text-xl">
                  Dengan menggunakan fisheries,produksi ikan kering menjadi lebih murah dan efisien
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="unduh" class="w-screen px-3 flex items-center pt-10 mt-10 relative">
      <div class="flex flex-col justify-start px-10 ml-12">
        <h1 class="text-gray-700 font-bold text-5xl mt-5 mb-3 w-7/12">Unduh Aplikasi Fisheries Sekarang</h1>
        <p class="w-10/12 font-light text-gray-700 mt-7">
          Aplikasi fisheries digunakan untuk mempermudah proses pengeringan ikan. Aplikasi ini membuat proses pengeringan ikan menjadi lebih mudah
        </p>
        <a class="px-4 text-white w-3/12 text-center py-3 rounded-xl shadow-lg mt-4 ring-black/20" style="background-color: #6BC9D1;">Unduh Sekarang</a>
      </div>
      <img src="assets/Fig2.png"/>
    </div>

    <div id="tentang" class="w-screen px-8 flex items-center justify-center py-12 relative" style="height: 80vh;">
      <h1 class="w-8/12 text-center font-bold text-5xl text-gray-400">
        Project Fisheries menawarkan solusi untuk meningkatkan produktifitas dan efisiensi dalam proses pengeringan ikan. Penggunaan teknologi tepat guna dalam proses pengeringan ikan mampu meningkatkan produktifitas dan efisiensi
      </h1>
      <img class="absolute bottom-0 right-0 -z-50" src="assets/Bubble.svg"/>
    </div>
  </body>
  <footer class="py-8" style="background-color: #242424;">
    <div class="w-screen flex justify-center">
      <img src="assets/fisheries.png" class="rounded-full w-12 h-12 mx-5"/>
      <img src="assets/instiki.png" class="rounded-full w-11 h-11 mx-5"/>
    </div>
    <div class="w-screen flex justify-center mt-3">
      <h1 class="text-white">© Copyright 2024. Fisheries</h1>
    </div>
  </footer>
</html>
