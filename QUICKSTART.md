# 🚀 Quick Start Guide

Panduan cepat untuk menjalankan aplikasi Kawaii Kuudere Chat Example.

---

## ⚡ Super Quick Start (5 Menit)

### Prerequisites

-   PHP 8.2+
-   Composer
-   Node.js & NPM

### Steps

```bash
# 1. Masuk ke directory project
cd chat

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Setup database
touch database/database.sqlite
php artisan migrate
php artisan db:seed --class=ProductSeeder

# 5. Setup Gemini API
# Edit .env dan tambahkan:
# GEMINI_API_KEY=your_api_key_here

# 6. Build assets
npm run build

# 7. Run server
php artisan serve
```

### 🌐 Open Browser

```
http://localhost:8000
```

---

## 🎯 Yang Harus Dicek

### ✅ Checklist

-   [ ] Homepage loads dengan UI baru (dark theme, pink/purple accents)
-   [ ] Bisa kirim message
-   [ ] AI responds dengan personality Yuki-chan
-   [ ] Sidebar menampilkan produk laptop
-   [ ] Hover effects bekerja pada buttons dan cards
-   [ ] Typing indicator muncul saat AI thinking
-   [ ] Clear chat button berfungsi
-   [ ] Scrollbar custom terlihat

---

## 🎨 Visual Features to Notice

### 1. Color Scheme

-   **Background**: Dark (#1a1a1a)
-   **Accents**: Pink (#ff6b9d) & Purple (#a78bfa)
-   **Text**: High contrast white (#f5f5f5)

### 2. Gradients

-   User messages: Pink to purple gradient
-   Buttons: Pink to purple gradient
-   Badges: Gradient with pulse animation
-   Scrollbar: Gradient thumb

### 3. Animations

-   Button hover: Lift effect
-   Product card hover: Slide effect
-   Typing indicator: Bouncing dots
-   Badge: Subtle pulse

### 4. Typography

-   Clear hierarchy (H1 > H2 > H3)
-   Bold headings (weight 700)
-   Pink accent on headings
-   Readable body text

---

## 🔍 Test Cases

### Basic Functionality

```
1. Send message: "Halo Yuki-chan"
   ✅ AI should respond with kawaii greeting

2. Ask product: "Laptop gaming terbaik?"
   ✅ AI should recommend gaming laptops

3. Ask budget: "Budget 10 juta"
   ✅ AI should filter by price

4. Clear chat
   ✅ All messages cleared, welcome screen shows
```

### UI Elements

```
1. Hover over "Kirim" button
   ✅ Button lifts up slightly

2. Hover over product card
   ✅ Card slides right with pink border

3. Focus input field
   ✅ Pink glow appears

4. Scroll chat/sidebar
   ✅ Custom gradient scrollbar visible
```

---

## ⚙ Configuration

### Required: Gemini API Key

```env
GEMINI_API_KEY=your_key_here
```

**Get it from**: https://makersuite.google.com/app/apikey

### Optional: Database

Default: SQLite

```env
DB_CONNECTION=sqlite
```

For MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=chat_db
DB_USERNAME=root
DB_PASSWORD=
```

---

## 🛠 Troubleshooting

### Issue: White page / Error 500

```bash
# Clear cache
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Check logs
tail -f storage/logs/laravel.log
```

### Issue: CSS not loading

```bash
# Rebuild assets
npm run build

# Or run dev mode
npm run dev
```

### Issue: Database not found

```bash
# Make sure database exists
touch database/database.sqlite

# Run migrations again
php artisan migrate:fresh
php artisan db:seed --class=ProductSeeder
```

### Issue: AI not responding

```bash
# Check API key in .env
GEMINI_API_KEY=your_key_here

# Clear config
php artisan config:clear

# Check internet connection
```

---

## 📚 Documentation Links

-   **Main README**: `README.md`
-   **UI/UX Details**: `UIUX_IMPROVEMENTS.md`
-   **Color Reference**: `COLOR_PALETTE.md`
-   **Project Summary**: `PROJECT_COMPLETE.md`

---

## 💡 Quick Tips

### For Development

```bash
# Run in dev mode (hot reload)
npm run dev

# Run server on different port
php artisan serve --port=8001

# Watch logs
tail -f storage/logs/laravel.log
```

### For Production

```bash
# Build optimized assets
npm run build

# Optimize Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🎨 Customization Quick Guide

### Change Primary Color

Edit `resources/views/layouts/app.blade.php`:

```css
:root {
    --accent-primary: #ff6b9d; /* Change this */
}
```

### Change AI Personality

Edit `app/Http/Controllers/ChatController.php`:

```php
$prompt = "Kamu adalah Yuki-chan..."; // Edit personality here
```

### Add Product

```bash
php artisan tinker
>>> App\Models\Product::create([...]);
```

---

## 📱 Browser Support

| Browser     | Status             |
| ----------- | ------------------ |
| Chrome 90+  | ✅ Fully Supported |
| Firefox 88+ | ✅ Fully Supported |
| Edge 90+    | ✅ Fully Supported |
| Safari 14+  | ✅ Fully Supported |
| Opera 76+   | ✅ Fully Supported |

---

## 🎯 Key Features to Showcase

1. **AI Chat**: Natural conversation with Yuki-chan
2. **High Contrast UI**: Easy to read, modern design
3. **Smooth Animations**: Professional feel
4. **Product Catalog**: Color-coded specifications
5. **Responsive**: Works on all devices
6. **Accessible**: WCAG AAA compliant

---

## ✨ Demo Flow

```
1. Open app → Welcome screen with flower emoji
2. Type: "Halo Yuki-chan" → AI greets kawaii-style
3. Ask: "Laptop untuk programming?" → AI recommends
4. Hover products → See smooth animations
5. Clear chat → Start fresh
```

---

## 🙋 FAQ

**Q: Port 8000 already in use?**

```bash
php artisan serve --port=8001
```

**Q: Want to add more products?**

```bash
# Edit database/seeders/ProductSeeder.php
# Then run:
php artisan db:seed --class=ProductSeeder
```

**Q: How to change theme color?**

```
Edit CSS variables in:
resources/views/layouts/app.blade.php
```

**Q: AI responds in English?**

```
Check prompt in ChatController.php
Make sure "bahasa Indonesia" is specified
```

---

<div align="center">

## 🎉 You're Ready!

**Start the server and enjoy! (◕‿◕✿)**

```bash
php artisan serve
```

**Then open**: http://localhost:8000

---

Made with 💜 by Laptop Kawaii Kuudere Team

</div>
