# Steak House — restoran veb-sayti

Toshkentdagi premium styeyk restorani uchun yasalgan ko'p tilli, responsive veb-sayt. Loyiha **Laravel 13** asosida qurilgan bo'lib, tashrif buyuruvchilarga taomnoma, galereya, jamoa, afzalliklar va stol band qilish imkoniyatlarini taqdim etadi.

## Xususiyatlar

- **7 ta sahifa**: Bosh sahifa, Afzalliklar, Biz haqimizda, Taomnoma, Jamoa, Galereya, Aloqa.
- **Ikki tillilik (i18n)**: O'zbekcha / Inglizcha. Til tanlash `/lang/{locale}` orqali sessionga saqlanadi, `SetLocale` middleware har so'rovda tilni qo'llaydi. Barcha matnlar `lang/uz` va `lang/en` papkalarida.
- **Taomnoma**: 6 toifa (steyklar, boshlang'ich taomlar, sho'rvalar, garnirlar, desertlar, ichimliklar) bo'yicha filtrlash, 6 ta elementli sahifalash (pagination), server tomonida ham ko'rsatiladi.
- **Aloqa / bron qilish shakli**: `name`, `email`, `message` majburiy; `phone`, `date`, `guests` ixtiyoriy. Validatsiya xatolari tarjima qilinadi. So'rovlar **daqiqasiga 5 ta** bilan cheklangan (`throttle:5,1`).
- **SEO**: har bir sahifa uchun alohida title/description/keywords, canonical URL, Open Graph va Twitter Card meta teglari, `Schema.org Restaurant` strukturasi, `robots.txt` va avtomatik `/sitemap.xml`.
- **Testlar**: Feature va Unit testlar (sahifalar, shakl validatsiyasi, til almashinuvi, tarjima fayllari, sitemap).

## Texnologiyalar

| Texnologiya | Versiya / Tavsif |
| --- | --- |
| PHP | 8.3+ |
| Laravel | 13.x |
| Vite | 8.x |
| Tailwind CSS | 4.x (`@tailwindcss/vite`) |
| Bootstrap | statik shablon (`public/css`, `public/js`) |
| SQLite | standart ma'lumotlar bazasi |
| PHPUnit | 12.x |

> Eslatma: Vite va Tailwind sozlangan bo'lsa-da, sahifalar hozirda `public/css` va `public/js` dagi tayyor shablon resurslaridan foydalanadi.

## O'rnatish

### Talablar

- PHP 8.3+ (mbstring, xml, pdo_sqlite kengaytmalari bilan)
- Composer
- Node.js va npm

### Qadamlar

```bash
# Repozitoriydan keyin
cd steakhouse

# Bog'liqliklarni o'rnatish
composer install
npm install

# .env faylini yaratish va kalit generatsiya qilish
cp .env.example .env
php artisan key:generate

# Ma'lumotlar bazasini tayyorlash (session/cache/queue database driveridan foydalanadi)
touch database/database.sqlite
php artisan migrate

# Frontendni yig'ish
npm run build
```

Barcha bosqichlarni bir komanda bilan bajarish uchun:

```bash
composer setup
```

### Ishga tushirish

Barcha kerakli xizmatlar (server, queue, loglar, Vite) bilan bir komandada:

```bash
composer dev
```

Yoki alohida:

```bash
php artisan serve
npm run dev
```

Sayt `http://127.0.0.1:8000` manzilida ochiladi.

## Konfiguratsiya

`.env` faylidagi asosiy parametrlar:

```env
APP_NAME="Steak House"
APP_URL=http://localhost
APP_LOCALE=uz
APP_FALLBACK_LOCALE=en
DB_CONNECTION=sqlite
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
MAIL_MAILER=log
```

`APP_LOCALE` — til tanlanmagan holatdagi standart til (`uz` yoki `en`).

## Marshrutlar

| Metod | URL | Nomi | Tavsif |
| --- | --- | --- | --- |
| GET | `/` | `home` | Bosh sahifa |
| GET | `/feature` | `feature` | Afzalliklar |
| GET | `/about` | `about` | Biz haqimizda |
| GET | `/menu` | `menu` | Taomnoma (`?category=`, `?page=`) |
| GET | `/team` | `team` | Jamoa |
| GET | `/gallery` | `gallery` | Galereya |
| GET/POST | `/contact` | `contact` / `contact.submit` | Aloqa va stol band qilish |
| GET | `/lang/{locale}` | `lang.switch` | Til almashinuvi (`uz`, `en`) |
| GET | `/sitemap.xml` | `sitemap` | XML sayt xaritasi |
| GET | `/up` | — | Sog'liqni tekshirish (health check) |

## Testlar

```bash
php artisan test
# yoki
composer test
```

Testlar quyidagilarni qamrab oladi: barcha sahifalarning 200 javob qaytarishi, aloqa shakli validatsiyasi va rate limiting, til almashinuvi va tarjimalarning to'g'ri qo'llanishi, tarjima kalitlarining ikki tilda mosligi, taom rasmlarining mavjudligi, sitemap tuzilishi.

## Loyiha tuzilmasi

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── PageController.php     # Sahifalar, aloqa shakli, sitemap
│   │   └── UserController.php     # Foydalanuvchi misoli
│   └── Middleware/
│       └── SetLocale.php          # Session asosida tilni qo'llash
├── Models/
│   └── User.php
└── Providers/
    └── AppServiceProvider.php

bootstrap/app.php                  # SetLocale middleware web guruhiga qo'shilgan
config/                            # Laravel konfiguratsiyasi
database/
├── migrations/
├── factories/
└── seeders/
lang/{uz,en}/                      # Tarjima fayllari
resources/
├── views/
│   ├── components/
│   │   ├── layouts/main.blade.php # Umumiy layout, SEO meta teglari, footer
│   │   ├── navbar.blade.php       # Navigatsiya va til tanlagich
│   │   └── menu-section.blade.php # Taomnoma, filtr va sahifalash
│   └── *.blade.php                # Sahifa ko'rinishlari
├── css/app.css
└── js/app.js
routes/web.php                     # Barcha veb-marshrutlar
tests/{Feature,Unit}/              # Testlar
```

## Litsenziya

Laravel framework ochiq manbali dastur bo'lib, [MIT litsenziyasi](https://opensource.org/licenses/MIT) ostida tarqatiladi.
