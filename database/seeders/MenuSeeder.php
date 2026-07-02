<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $foods = [
            [
                'nama_menu' => 'Spaghetti Carbonara',
                'kategori' => 'Food',
                'harga' => 45000,
                'foto' => 'images/pasta/Spaghetti-300x186.webp',
                'komposisi' => 'Pasta, telur, keju parmesan, pancetta, lada hitam',
                'kalori' => 420,
                'protein' => 18.5,
                'lemak' => 22.0,
                'karbohidrat' => 45.0,
                'deskripsi' => 'Spaghetti carbonara klasik dengan saus krim telur dan keju parmesan.',
            ],
            [
                'nama_menu' => 'Fettuccine Alfredo',
                'kategori' => 'Food',
                'harga' => 48000,
                'foto' => 'images/pasta/Fettuccine-Alfredo-V-1-300x186.webp',
                'komposisi' => 'Fettuccine, krim, keju parmesan, mentega, bawang putih',
                'kalori' => 480,
                'protein' => 16.0,
                'lemak' => 25.0,
                'karbohidrat' => 50.0,
                'deskripsi' => 'Fettuccine alfredo creamy dengan saus keju yang kaya rasa.',
            ],
            [
                'nama_menu' => 'Penne Arrabiata',
                'kategori' => 'Food',
                'harga' => 38000,
                'foto' => 'images/pasta/Five-Cheese-Ziti-al-Forno-300x186.webp',
                'komposisi' => 'Penne, tomat, cabai, bawang putih, minyak zaitun, basil',
                'kalori' => 350,
                'protein' => 12.0,
                'lemak' => 15.0,
                'karbohidrat' => 48.0,
                'deskripsi' => 'Penne pedas dengan saus tomat segar dan rempah pilihan.',
            ],
            [
                'nama_menu' => 'Lasagna Bolognese',
                'kategori' => 'Food',
                'harga' => 52000,
                'foto' => 'images/pasta/Lasagna-Classico-1-300x186.webp',
                'komposisi' => 'Pasta lasagna, daging sapi giling, saus tomat, keju mozzarella, bechamel',
                'kalori' => 550,
                'protein' => 28.0,
                'lemak' => 30.0,
                'karbohidrat' => 42.0,
                'deskripsi' => 'Lasagna berlapis dengan daging sapi giling dan keju leleh.',
            ],
            [
                'nama_menu' => 'Linguine Seafood',
                'kategori' => 'Food',
                'harga' => 58000,
                'foto' => 'images/pasta/Shrimp-Scampi-1-300x186.webp',
                'komposisi' => 'Linguine, udang, cumi, kerang, bawang putih, minyak zaitun',
                'kalori' => 380,
                'protein' => 24.0,
                'lemak' => 18.0,
                'karbohidrat' => 40.0,
                'deskripsi' => 'Linguine dengan campuran seafood segar dan saus white wine.',
            ],
            [
                'nama_menu' => 'Ravioli Ricotta',
                'kategori' => 'Food',
                'harga' => 49000,
                'foto' => 'images/pasta/Cheese-Ravioli-1-300x186.webp',
                'komposisi' => 'Pasta ravioli, ricotta, bayam, keju parmesan, sage butter',
                'kalori' => 440,
                'protein' => 20.0,
                'lemak' => 24.0,
                'karbohidrat' => 38.0,
                'deskripsi' => 'Ravioli isi ricotta dan bayam dengan saus sage butter.',
            ],
            [
                'nama_menu' => 'Pappardelle Mushroom',
                'kategori' => 'Food',
                'harga' => 46000,
                'foto' => 'images/pasta/Soup-Salad-and-Breadsticks-Lunch-300x186.webp',
                'komposisi' => 'Pappardelle, jamur kancing, jamur shiitake, truffle oil, thyme',
                'kalori' => 360,
                'protein' => 14.0,
                'lemak' => 20.0,
                'karbohidrat' => 44.0,
                'deskripsi' => 'Pappardelle dengan ragam jamur dan minyak truffle aromatik.',
            ],
            [
                'nama_menu' => 'Tortellini Pesto',
                'kategori' => 'Food',
                'harga' => 47000,
                'foto' => 'images/pasta/Chicken-Parmigiana-1-300x186.webp',
                'komposisi' => 'Tortellini, basil, kacang pinus, keju parmesan, minyak zaitun',
                'kalori' => 410,
                'protein' => 17.0,
                'lemak' => 23.0,
                'karbohidrat' => 42.0,
                'deskripsi' => 'Tortellini dengan saus pesto basil segar buatan sendiri.',
            ],
        ];

        $beverages = [
            [
                'nama_menu' => 'Espresso',
                'kategori' => 'Beverage',
                'harga' => 18000,
                'foto' => 'images/drinks/Lavazza-Espresso-2048x1267-1-300x186.webp',
                'komposisi' => 'Biji kopi arabika pilihan',
                'kalori' => 5,
                'protein' => 0.3,
                'lemak' => 0.1,
                'karbohidrat' => 0.5,
                'deskripsi' => 'Espresso klasik dengan biji kopi arabika pilihan.',
            ],
            [
                'nama_menu' => 'Cappuccino',
                'kategori' => 'Beverage',
                'harga' => 28000,
                'foto' => 'images/drinks/Cappuccino-300x186.webp',
                'komposisi' => 'Espresso, susu steamed, busa susu, coklat bubuk',
                'kalori' => 120,
                'protein' => 6.0,
                'lemak' => 7.0,
                'karbohidrat' => 10.0,
                'deskripsi' => 'Cappuccino dengan busa susu lembut dan taburan coklat.',
            ],
            [
                'nama_menu' => 'Matcha Latte',
                'kategori' => 'Beverage',
                'harga' => 32000,
                'foto' => 'images/drinks/Fresh-Brewed-Iced-Tea-300x186.webp',
                'komposisi' => 'Matcha bubuk, susu, gula',
                'kalori' => 150,
                'protein' => 5.0,
                'lemak' => 6.0,
                'karbohidrat' => 18.0,
                'deskripsi' => 'Matcha latte creamy dengan rasa autentik Jepang.',
            ],
            [
                'nama_menu' => 'Lemonade',
                'kategori' => 'Beverage',
                'harga' => 20000,
                'foto' => 'images/drinks/Classic-Lemonade-300x186.webp',
                'komposisi' => 'Lemon segar, gula, air soda, es batu, mint',
                'kalori' => 80,
                'protein' => 0.2,
                'lemak' => 0.1,
                'karbohidrat' => 20.0,
                'deskripsi' => 'Lemonade segar dengan perasan lemon asli dan daun mint.',
            ],
            [
                'nama_menu' => 'Mango Smoothie',
                'kategori' => 'Beverage',
                'harga' => 35000,
                'foto' => 'images/drinks/Mango-Strawberry-Iced-Tea-300x186.webp',
                'komposisi' => 'Mangga segar, yogurt, susu, madu, es batu',
                'kalori' => 200,
                'protein' => 4.0,
                'lemak' => 3.0,
                'karbohidrat' => 40.0,
                'deskripsi' => 'Smoothie mangga segar dengan yogurt dan madu.',
            ],
            [
                'nama_menu' => 'Iced Caramel Macchiato',
                'kategori' => 'Beverage',
                'harga' => 38000,
                'foto' => 'images/drinks/Bellini-Peach-Raspberry-Iced-Tea-300x186.webp',
                'komposisi' => 'Espresso, susu, saus caramel, es batu, vanila',
                'kalori' => 180,
                'protein' => 5.0,
                'lemak' => 6.0,
                'karbohidrat' => 28.0,
                'deskripsi' => 'Iced caramel macchiato manis dengan lapisan espresso.',
            ],
            [
                'nama_menu' => 'Thai Tea',
                'kategori' => 'Beverage',
                'harga' => 25000,
                'foto' => 'images/drinks/Strawberry-Passion-Fruit-Limonata-300x186.webp',
                'komposisi' => 'Teh Thailand, susu kental manis, es batu, rempah',
                'kalori' => 160,
                'protein' => 3.0,
                'lemak' => 5.0,
                'karbohidrat' => 26.0,
                'deskripsi' => 'Thai tea otentik dengan susu kental manis dan rempah.',
            ],
        ];

        $desserts = [
            [
                'nama_menu' => 'Tiramisu',
                'kategori' => 'Dessert',
                'harga' => 38000,
                'foto' => 'images/desserts/Tiramisu-V-1-768x475-1-300x186.webp',
                'komposisi' => 'Ladyfinger, mascarpone, kopi espresso, coklat bubuk, telur',
                'kalori' => 320,
                'protein' => 8.0,
                'lemak' => 22.0,
                'karbohidrat' => 28.0,
                'deskripsi' => 'Tiramisu klasik Italia yang lembut dan kaya rasa kopi.',
            ],
            [
                'nama_menu' => 'Panna Cotta',
                'kategori' => 'Dessert',
                'harga' => 32000,
                'foto' => 'images/desserts/Black-Tie-Mousse-Cake-V-300x186.webp',
                'komposisi' => 'Krim segar, vanila, gelatin, saus berry segar',
                'kalori' => 250,
                'protein' => 5.0,
                'lemak' => 20.0,
                'karbohidrat' => 18.0,
                'deskripsi' => 'Panna cotta lembut dengan saus berry segar.',
            ],
            [
                'nama_menu' => 'Chocolate Lava Cake',
                'kategori' => 'Dessert',
                'harga' => 42000,
                'foto' => 'images/desserts/Chocolate-Lasagna-V-300x186.webp',
                'komposisi' => 'Coklat hitam, mentega, telur, gula, tepung terigu',
                'kalori' => 450,
                'protein' => 7.0,
                'lemak' => 30.0,
                'karbohidrat' => 42.0,
                'deskripsi' => 'Chocolate lava cake dengan lelehan coklat hangat di dalamnya.',
            ],
            [
                'nama_menu' => 'Crème Brûlée',
                'kategori' => 'Dessert',
                'harga' => 35000,
                'foto' => 'images/desserts/Sicilian-Cheesecake-with-Strawberry-Topping-V-768x476-1-300x186.webp',
                'komposisi' => 'Krim segar, telur, vanila, gula karamel',
                'kalori' => 280,
                'protein' => 6.0,
                'lemak' => 22.0,
                'karbohidrat' => 20.0,
                'deskripsi' => 'Crème brûlée klasik dengan lapisan gula karamel renyah.',
            ],
            [
                'nama_menu' => 'Gelato Trio',
                'kategori' => 'Dessert',
                'harga' => 30000,
                'foto' => 'images/desserts/Warm-Italian-Doughnuts-V-768x475-1-300x186.webp',
                'komposisi' => 'Vanila, coklat, strawberry, krim segar',
                'kalori' => 220,
                'protein' => 4.0,
                'lemak' => 15.0,
                'karbohidrat' => 25.0,
                'deskripsi' => 'Tiga rasa gelato Italia pilihan dalam satu sajian.',
            ],
        ];

        $allMenus = array_merge($foods, $beverages, $desserts);

        foreach ($allMenus as $index => $menuData) {
            $status = $index < 17 ? 'Ready' : 'Sold Out';
            $rating = round(3.5 + (rand(0, 15) / 10), 1);

            $menuData['status'] = $status;
            $menuData['rating'] = $rating;
            $menuData['slug'] = \Illuminate\Support\Str::slug($menuData['nama_menu']);

            Menu::create($menuData);
        }
    }
}
