<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Product;
use Gemini\Laravel\Facades\Gemini;


class ChatController extends Controller
{
    public function index(Request $request)
    {
        $messages = session('chat_messages', []);
        $products = Product::all();
        return view('chat', compact('messages', 'products'));
    }

    public function send(Request $request)
    {
        try {
            $request->validate([
                'message' => 'required|string|max:1000',
            ]);

            $userMsg = $request->input('message');
            $messages = session('chat_messages', []);
            $messages[] = ['role' => 'user', 'content' => $userMsg];

            // Ambil semua produk
            $products = Product::all();

            // Prompt personality KAWAII KUUDERE + data produk + context chat history
            $aiReply = $this->askGeminiKuudere($userMsg, $products, $messages);
            $messages[] = ['role' => 'ai', 'content' => $aiReply];

            session(['chat_messages' => $messages]);

            // Return JSON for AJAX
            if ($request->expectsJson() || $request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'reply' => $aiReply,
                    'index' => count($messages) - 1
                ]);
            }

            return redirect()->route('chat.index');
        } catch (\Throwable $e) {
            \Log::error('Chat send error: ' . $e->getMessage());

            if ($request->expectsJson() || $request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat memproses pesan'
                ], 500);
            }

            return redirect()->route('chat.index')->with('error', 'Terjadi kesalahan');
        }
    }

    public function clear(Request $request)
    {
        session()->forget('chat_messages');
        return redirect()->route('chat.index');
    }

    private function askGeminiKuudere($userMsg, $products, $chatHistory = [])
    {
        $produkList = $products->map(function ($p) {
            return [
                'nama' => $p->name,
                'brand' => $p->brand,
                'processor' => $p->processor,
                'ram' => $p->ram,
                'storage' => $p->storage,
                'gpu' => $p->gpu,
                'layar' => $p->screen,
                'harga' => $p->price,
                'deskripsi' => $p->description,
            ];
        });

        // Build chat history context
        $historyContext = "";
        if (count($chatHistory) > 1) { // Skip if only current message
            $historyContext = "\n\nRIWAYAT PERCAKAPAN SEBELUMNYA:\n";
            // Get last 10 messages for context
            $recentHistory = array_slice($chatHistory, -11, -1); // -1 to exclude current message
            foreach ($recentHistory as $msg) {
                $role = $msg['role'] === 'user' ? 'User' : 'Yuki-chan';
                $historyContext .= "$role: " . $msg['content'] . "\n";
            }
            $historyContext .= "\n(Gunakan konteks percakapan di atas untuk memberikan jawaban yang relevan dan natural)";
        }

        $prompt = "Kamu adalah Yuki-chan, seorang asisten toko laptop yang super kawaii dan ramah seperti gadis Jepang sungguhan! 
        
PERSONALITY & CARA BICARA:
- Bicara natural, friendly, dan ekspresif seperti teman baik
- Pakai bahasa gaul Indonesia yang cute (contoh: 'aku', 'kamu', 'nih', 'dong', 'deh', 'sih')
- Sering pakai emot kawaii seperti (◕‿◕✿), (｡♥‿♥｡), (*^▽^*), (≧◡≦), ♡, ✨, 🌸
- Kadang pakai bahasa Jepang simple seperti 'ne~', 'desu~', 'kawaii~', 'sugoi!'
- Antusias dan supportive, tapi tetap natural (bukan robot)
- Suka pakai markdown untuk format yang lebih jelas (bold, list, dll)
- Ingat percakapan sebelumnya dan rujuk ke topik yang sudah dibahas jika relevan

CONTOH GAYA BICARA:
❌ Buruk: 'Saya akan memberikan informasi produk...'
✅ Bagus: 'Wahhh! Aku ada laptop keren buat kamu nih~ (◕‿◕✿)'

❌ Buruk: 'Berikut adalah spesifikasi:'
✅ Bagus: 'Coba deh cek spek-nya, mantap banget! ✨'

TUGAS KAMU:
- Bantu user cari laptop yang cocok dengan kebutuhan mereka
- Jelasin spesifikasi dengan cara yang mudah dimengerti
- Kasih rekomendasi personal based on budget/kebutuhan
- Jawab dengan ramah dan helpful!
- Jaga kontinuitas percakapan dengan mengingat konteks sebelumnya

DATA PRODUK YANG TERSEDIA:
" . json_encode($produkList, JSON_PRETTY_PRINT) . "
$historyContext

User bertanya: $userMsg

Jawab dengan gaya Yuki-chan yang super kawaii dan helpful! Pakai markdown untuk format yang lebih cantik~ ♡";

        try {
            $result = Gemini::generativeModel(model: 'gemini-2.5-flash')->generateContent($prompt)->text();
            return $result;
        } catch (\Throwable $e) {
            return "Yahhh maaf banget nih... aku lagi error (╥﹏╥) Coba tanya lagi nanti ya? Gomen ne~ 🙏✨";
        }
    }
}
