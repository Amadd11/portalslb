<footer class="bg-gray-800 text-gray-300 py-4 p-4">
    <div class="container mx-auto flex flex-col lg:flex-row gap-8 items-center">
        <!-- Kiri -->
        <div class="lg:w-1/2 flex flex-col space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-4 sm:space-y-0">
                <div class="flex justify-center sm:justify-start space-x-4">
                    <img src="{{ asset('assets/images/logo-slb1.png') }}" alt="Logo SLB"
                        class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-full">
                    <img src="{{ asset('assets/images/logo-dinas.png') }}" alt="Logo Dinas"
                        class="w-16 h-16 sm:w-20 sm:h-20">
                    <img src="{{ asset('assets/images/logo-kemendikbud.png') }}" alt="Logo Kemendikbud"
                        class="w-16 h-16 sm:w-20 sm:h-20">
                </div>
                <h3 class="text-xl sm:text-2xl font-bold text-gray-300 text-center sm:text-left">
                    SLB NEGERI 1 LEBONG
                </h3>
            </div>

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d509933.8502318125!2d101.6359573890625!3d-3.132149499999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e317a71a59da9c3%3A0xf273836985d4a7e8!2sSLB%20N%20Lebong!5e0!3m2!1sid!2sid!4v1742559839922!5m2!1sid!2sid"
                width="100%" height="250" class="rounded shadow w-full sm:h-72 md:h-80" style="border:0;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>


        <!-- Kanan -->
        <div class="lg:w-1/2 flex flex-col justify-between mt-15 space-y-4">
            <!-- Lokasi -->
            <div>
                <h4 class="font-bold text-xl mb-2">Lokasi Sekolah</h4>
                <p><i class="fas fa-map-marker-alt mr-2"></i>Jln. Lintas Curup Muara Aman, Ds. Lemeu Pit, Kec.
                    Lebong Sakti, Kabupaten Lebong, Bengkulu 39264</p>
            </div>
            <!-- Kontak -->
            <div class="mt-6">
                <h4 class="font-bold text-xl mb-2">Kontak Kami</h4>
                <p><i class="fas fa-envelope mr-2"></i> slbn1lebong12@gmail.com</p>
                <p><i class="fas fa-phone mr-2"></i> 081329984943</p>
            </div>
            <!-- Sosmed -->
            <div class="flex space-x-4 mt-4">
                <a href="https://www.facebook.com/slb.lebong?locale=id_ID"
                    class="w-9 h-9 flex items-center justify-center border rounded-full hover:bg-gray-700 transition"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="#"
                    class="w-9 h-9 flex items-center justify-center border rounded-full hover:bg-gray-700 transition"><i
                        class="fab fa-instagram"></i></a>
                <a href="#"
                    class="w-9 h-9 flex items-center justify-center border rounded-full hover:bg-gray-700 transition"><i
                        class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="mt-8 text-center text-sm text-gray-400">
        &copy; {{ date('Y') }} SLB Negeri 1 Lebong. All rights reserved.
    </div>
</footer>
