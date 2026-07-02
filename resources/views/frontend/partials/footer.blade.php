<footer class="text-white py-5 mt-5" style="background-color: #343a40;">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5><i class="fas fa-utensils me-2"></i>{{ config('app.name') }}</h5>
                <p class="text-white-50">Nikmati pengalaman memesan makanan digital dengan mudah dan cepat.</p>
            </div>
            <div class="col-md-4">
                <h5>Menu</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('frontend.menus.index', ['kategori' => 'Food']) }}" class="text-white-50 text-decoration-none">Food</a></li>
                    <li><a href="{{ route('frontend.menus.index', ['kategori' => 'Beverage']) }}" class="text-white-50 text-decoration-none">Beverage</a></li>
                    <li><a href="{{ route('frontend.menus.index', ['kategori' => 'Dessert']) }}" class="text-white-50 text-decoration-none">Dessert</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Jam Operasional</h5>
                <p class="text-white-50 mb-1">Senin - Jumat: 08:00 - 22:00</p>
                <p class="text-white-50 mb-1">Sabtu - Minggu: 09:00 - 23:00</p>
            </div>
        </div>
        <hr class="text-white-50 my-4">
        <div class="text-center">
            <small class="text-white-50">
                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </small>
        </div>
    </div>
</footer>
