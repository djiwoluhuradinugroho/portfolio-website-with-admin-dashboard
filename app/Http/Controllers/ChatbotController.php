<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ChatbotController extends Controller
{
    private array $pricing = [
        'chibi'        => ['min' => 80000,  'max' => 150000, 'timeline' => '3-5 hari'],
        'anime'        => ['min' => 150000, 'max' => 300000, 'timeline' => '5-7 hari'],
        'fanart'       => ['min' => 120000, 'max' => 250000, 'timeline' => '4-6 hari'],
        'oc'           => ['min' => 150000, 'max' => 350000, 'timeline' => '5-8 hari'],
        'bust'         => ['min' => 100000, 'max' => 180000, 'timeline' => '3-5 hari'],
        'half body'    => ['min' => 130000, 'max' => 220000, 'timeline' => '4-6 hari'],
        'full body'    => ['min' => 180000, 'max' => 320000, 'timeline' => '5-7 hari'],
        'couple'       => ['min' => 280000, 'max' => 500000, 'timeline' => '6-8 hari'],
        'cover'        => ['min' => 250000, 'max' => 500000, 'timeline' => '7-10 hari'],
        'poster'       => ['min' => 280000, 'max' => 550000, 'timeline' => '7-10 hari'],
    ];

    public function handle(Request $request)
    {
        $message = trim($request->input('message', ''));
        if ($message === '') {
            return response()->json(['reply' => 'Eh pesannya kosong nih 😅 Coba ketik lagi!', 'wa_link' => null]);
        }

        $history = Session::get('chat_history', []);
        $result  = $this->conversationManager($message, $history);

        $history[] = ['role' => 'user',      'content' => $message];
        $history[] = ['role' => 'assistant', 'content' => $result['reply']];
        if (count($history) > 16) $history = array_slice($history, -16);
        Session::put('chat_history', $history);

        return response()->json([
            'reply'   => $result['reply'],
            'wa_link' => $result['wa_link'] ?? null,
        ]);
    }

    private function conversationManager(string $message, array $history): array
    {
        $lower = strtolower($message);

        // ── Short acknowledgement dengan context → terusin ke AI ─────────────
        // Kata pendek ini harusnya jadi lanjutan obrolan, BUKAN trigger apapun
        $shortAcks    = ['boleh', 'oke', 'ok', 'sip', 'siap', 'noted', 'okok',
                         'iyaa', 'iya', 'yep', 'yaps', 'yup', 'yoi', 'mantap',
                         'bagus', 'setuju', 'paham', 'ngerti', 'mengerti'];
        $trimmedLower = trim($lower);
        if (count($history) > 0 && in_array($trimmedLower, $shortAcks)) {
            return ['reply' => $this->askAI($message, $history), 'wa_link' => null];
        }

        // ── Deteksi tipe/konsep DULU sebelum greeting ────────────────────────
        // Fix bug: "full body hehe" kelewat karena greeting check duluan
        $detected = $this->detectPricing($lower, $message);
        if ($detected) {
            $aiReply = $this->askAI($message, $history);
            return [
                'reply'   => $aiReply . "\n\n" . $detected['estimasi'],
                'wa_link' => $detected['wa_link'],
            ];
        }

        // ── Greeting ──────────────────────────────────────────────────────────
        if ($this->isGreeting($lower)) {
            if (count($history) === 0) {
                return ['reply' => $this->greetingFull(), 'wa_link' => null];
            }
            return ['reply' => $this->greetingShort(), 'wa_link' => null];
        }

        // ── Timeline / estimasi waktu ─────────────────────────────────────────
        if ($this->containsAny($lower, [
            'berapa lama', 'estimasi waktu', 'kapan selesai', 'lama nya', 'lamanya',
            'waktunya', 'berapa hari', 'deadline', 'selesainya', 'timeline',
            'kapan jadi', 'kapan kelar', 'kapan rampung', 'butuh berapa hari',
            'makan waktu', 'pengerjaannya lama', 'lama gak', 'lama ga',
            'cepet ga', 'cepet gak', 'bisa cepet', 'rush', 'urgent',
            'bisa dikebut', 'mepet deadline', 'kapan bisa',
        ])) {
            return ['reply' => $this->timelineReply($lower), 'wa_link' => null];
        }

        // ── Harga / estimasi ──────────────────────────────────────────────────
        if ($this->containsAny($lower, [
            'harga', 'berapa', 'price', 'biaya', 'estimasi', 'mahal', 'murah',
            'range harga', 'daftar harga', 'price list', 'pricelist', 'tarif',
            'ratenya', 'rate', 'ratek', 'kira kira berapa', 'kira-kira berapa',
            'habis berapa', 'budget', 'bayar berapa', 'ongkosnya', 'ongkos',
            'dibandrol', 'mulai dari berapa', 'paling murah', 'paling mahal',
            'bisa nego', 'bisa kurang', 'diskon', 'promo', 'harganya gimana',
        ])) {
            return ['reply' => $this->priceList(), 'wa_link' => null];
        }

        // ── Order / mau lanjut ────────────────────────────────────────────────
        if ($this->containsAny($lower, [
            'order', 'pesan', 'mau beli', 'mau commission', 'jadi', 'deal', 'gas',
            'lanjut', 'oke lanjut', 'setuju', 'bayar', 'dp', 'fix',
            'gaskeun', 'gaspol', 'gas pol', 'oke gas', 'ok gas', 'oke fix',
            'ok fix', 'siap', 'sip', 'oke sip', 'ok sip', 'sepakat',
            'mau order', 'mau pesan', 'mau request', 'request', 'jadi deh',
            'fix deh', 'deal deh', 'lanjutin', 'langsung aja', 'langsung order',
            'gimana cara bayar', 'cara bayar', 'transfer ke mana', 'nomor rekening',
            'rekening', 'gopay', 'ovo', 'dana', 'qris', 'mau dp', 'mau bayar',
            'mau lanjut', 'cocok', 'oke cocok', 'pas banget', 'sesuai budget',
        ])) {
            return $this->hardClose($message);
        }

        // ── Cara order / proses ───────────────────────────────────────────────
        if ($this->containsAny($lower, [
            'cara order', 'gimana cara', 'prosesnya', 'alurnya', 'cara pesan',
            'langkah', 'caranya gimana', 'gimana ordernya', 'alur order',
            'step by step', 'step nya', 'gimana prosesnya', 'mekanismenya',
            'cara commissionnya', 'gimana commissionnya', 'flow nya', 'flownya',
            'gimana sistemnya', 'sistemnya gimana', 'cara kerjanya', 'cara kerja',
        ])) {
            return [
                'reply'   => "📋 Gampang banget kok caranya!\n\n1️⃣ Ceritain konsep kamu di sini dulu\n2️⃣ Aku bantu estimasi harga & saranin style yang cocok\n3️⃣ Kalau udah cocok, lanjut konfirmasi via WA\n4️⃣ DP 50% → langsung mulai ngerjain\n5️⃣ Preview sketch dikirim → revisi kalau ada → finalisasi\n6️⃣ Pelunasan → file dikirim ke kamu 🎉\n\nRevisi 2x udah include ya. Santai aja, aku temenin dari awal sampe selesai 😊",
                'wa_link' => null,
            ];
        }

        // ── Revisi ────────────────────────────────────────────────────────────
        if ($this->containsAny($lower, [
            'revisi', 'revision', 'edit ulang', 'ubah', 'ganti', 'benerin',
            'diubah', 'diganti', 'direvisi', 'bisa direvisi', 'boleh revisi',
            'revisi berapa kali', 'berapa kali revisi', 'revisi gratis', 'free revisi',
            'kalau ga suka', 'kalau gak suka', 'kalau kurang cocok', 'kurang pas',
            'mau ganti', 'mau ubah', 'mau edit', 'edit lagi', 'rubah',
            'perubahan', 'koreksi', 'perbaikan',
        ])) {
            return [
                'reply'   => "✏️ Soal revisi, tenang aja!\n\n• 2x revisi udah include di semua paket\n• Revisi ke-3 dan seterusnya kena tambahan Rp25k/revisi\n• Aku selalu kirim preview sketch duluan biar meminimalisir miskomunikasi 😊\n\nJadi kamu bisa lihat dulu sebelum dilanjut ke tahap warnain!",
                'wa_link' => null,
            ];
        }

        // ── Format file ───────────────────────────────────────────────────────
        if ($this->containsAny($lower, [
            'format file', 'filenya', 'png', 'jpg', 'pdf', 'resolusi', 'ukuran file', 'formatnya',
            'format gambar', 'file format', 'extensinya', 'ekstensinya', 'jpeg',
            'dpi', 'high res', 'highres', 'resolusi tinggi', 'kualitas file',
            'file apa', 'kirimnya format apa', 'dikasih file apa', 'dapat file apa',
            'ukurannya', 'dimensinya', 'canvasnya', 'size gambar',
        ])) {
            return [
                'reply'   => "📁 Soal format file:\n\n• Default: PNG resolusi tinggi (300dpi)\n• Bisa request JPG juga kalau butuh\n• Untuk cover/poster bisa minta PDF print-ready\n• Ukuran canvas disesuaikan kebutuhan kamu\n\nMau dipake buat apa? Biar aku rekomendasiin format yang paling pas 😊",
                'wa_link' => null,
            ];
        }

        // ── Slot / ketersediaan ───────────────────────────────────────────────
        if ($this->containsAny($lower, [
            'slot', 'masih buka', 'masih ada', 'available', 'buka commission', 'lagi buka', 'open comm',
            'open commission', 'masih open', 'lagi open', 'bisa menerima', 'lagi nerima',
            'antrian', 'antriannya', 'waiting list', 'waitlist', 'wait list',
            'masih bisa order', 'bisa order sekarang', 'bisa pesan sekarang',
            'penuh ga', 'penuh gak', 'full ga', 'full gak', 'masih lowong',
            'jadwal kosong', 'kapan buka lagi', 'kapan open lagi',
        ])) {
            return [
                'reply'   => "✅ Commission lagi buka!\n\nTapi slot tiap minggu terbatas ya — biasanya cuma ngambil 3-5 project biar kualitas tetap terjaga.\n\nMakin cepet konfirmasi, makin cepet aku schedule-in 😊\nMau lanjut diskusi konsep dulu? 👀",
                'wa_link' => null,
            ];
        }

        // ── Mau tanya ─────────────────────────────────────────────────────────
        if ($this->containsAny($lower, [
            'mau tanya', 'boleh tanya', 'nanya', 'ada pertanyaan', 'mau nanya', 'boleh nanya',
            'mau nge tanya', 'mau ngobrol', 'mau diskusi', 'mau konsultasi',
            'konsultasi dulu', 'tanya dulu', 'nanya dulu', 'diskusi dulu',
            'ada yang mau kutanya', 'boleh ga tanya', 'boleh gak tanya',
            'bisa tanya', 'izin tanya', 'ijin tanya', 'permisi mau tanya',
            'minta info', 'info dong', 'infonya dong', 'jelasin dong',
        ])) {
            return [
                'reply'   => "Boleh banget, tanya aja santai! 😊\n\nYang sering ditanyain biasanya:\n\n• 💰 Harga & estimasi\n• ⏳ Berapa lama pengerjaannya\n• 🎨 Style yang tersedia\n• 📋 Cara & alur order\n• ✏️ Soal revisi\n• 📁 Format file hasil\n• ✅ Slot masih buka apa nggak\n\nMau tanya yang mana? Atau langsung ceritain konsepnya juga bisa! 👀",
                'wa_link' => null,
            ];
        }

        // ── Tanya style ───────────────────────────────────────────────────────
        if ($this->containsAny($lower, [
            'style apa', 'stylenya apa', 'ada style', 'style yang ada', 'jenis style',
            'pilihan style', 'style', 'style nya', 'gayanya', 'gaya gambar',
            'jenis gambar', 'tipe gambar', 'pilihan gambar', 'gambarnya bisa apa aja',
            'bisa gambar apa', 'bisa gambar apa aja', 'ngegambarnya style apa',
            'art style', 'artstyle', 'art stylenya', 'tema gambar',
            'bisa semi realis', 'realis', 'realistic', 'kartun', 'cartoony',
        ])) {
            return [
                'reply'   => "Ini style yang aku bisa 🎨\n\n• 🌸 Anime style — clean lineart, vibrant, cocok buat OC & fanart\n• 🐣 Chibi — cute, proporsi mini, cocok buat sticker & avatar\n• 🖌️ Semi realistic — detail tinggi, shading kompleks, buat poster/karya serius\n• ✏️ Sketch — lineart simple, budget friendly, cepet selesai\n• 🎭 Fan Art — karakter dari anime/game/manga favorit kamu\n• 📖 Cover — buat cover novel/buku, cinematic & dramatis\n\nMasing-masing harga & timeline beda ya tergantung kompleksitas.\nMau tau estimasi untuk style tertentu? 👀",
                'wa_link' => null,
            ];
        }

        // ── Terima kasih ──────────────────────────────────────────────────────
        if ($this->containsAny($lower, [
            'makasih', 'terima kasih', 'thanks', 'thank you', 'thx', 'ty',
            'tengkyu', 'tengkiu', 'mksh', 'tq', 'terimakasih', 'trimakasih',
            'thanks ya', 'makasih ya', 'makasih banyak', 'thanks banyak',
        ])) {
            $replies = [
                "Sama-sama kak! 😊 Kalau ada yang mau ditanyain lagi atau mau lanjut order, aku siap! 🔥",
                "No prob! ✨ Kalau mau diskusi konsep atau ada pertanyaan lain, gas aja ya 😎",
                "Santai aja kak! 🙌 Kapanpun mau order atau nanya-nanya, aku di sini 👀",
                "Siip! 😄 Semoga cepet jadi ya project-nya! Ada lagi yang bisa aku bantu? 🎨",
            ];
            return ['reply' => $replies[array_rand($replies)], 'wa_link' => null];
        }

        // ── Off-topic filter ──────────────────────────────────────────────────
        if ($this->isOffTopic($lower)) {
            $replies = [
                "Hehe itu di luar jangkauan aku cuy 😄\nAku spesialis ilustrasi aja! Ada yang mau digambar? 🎨",
                "Wkwk aku nggak nyambung soal itu 😅\nYuk balik ke topik — mau bikin ilustrasi apa? 👀",
                "Aduh itu bukan bidang aku hehe 😆\nKalau soal commission & ilustrasi, aku siap bantu full! 🔥",
                "Itu mah bukan kuasa aku 😂\nTapi kalau ngomongin soal gambar-menggambar, aku jagonya! Ceritain konsep kamu 🎨",
            ];
            return [
                'reply'   => $replies[array_rand($replies)],
                'wa_link' => null,
            ];
        }

        // ── Default → AI ──────────────────────────────────────────────────────
        return ['reply' => $this->askAI($message, $history), 'wa_link' => null];
    }

    // ── Timeline reply ────────────────────────────────────────────────────────
    private function timelineReply(string $lower): string
    {
        $map = [
            'chibi'       => 'chibi',
            'bust'        => 'bust',
            'half body'   => 'half body',
            'halfbody'    => 'half body',
            'full body'   => 'full body',
            'fullbody'    => 'full body',
            'couple'      => 'couple',
            'fanart'      => 'fanart',
            'fan art'     => 'fanart',
            'oc'          => 'oc',
            'cover'       => 'cover',
            'poster'      => 'poster',
            'anime'       => 'anime',
        ];

        foreach ($map as $keyword => $type) {
            if (str_contains($lower, $keyword) && isset($this->pricing[$type])) {
                $p = $this->pricing[$type];
                return "⏳ Estimasi waktu untuk {$type}:\n\n• Pengerjaan: **{$p['timeline']}** setelah DP masuk\n• Termasuk 2x sesi revisi\n• Aku selalu kirim preview sketch duluan sebelum finalisasi\n\nWaktu bisa lebih cepet kalau referensi & brief-nya udah lengkap dari awal 😊\nAda yang mau ditanyain lagi?";
            }
        }

        return "⏳ Estimasi waktu pengerjaan:\n\n• Chibi: 3-5 hari\n• Bust up: 3-5 hari\n• Half body: 4-6 hari\n• Full body: 5-7 hari\n• Fan Art: 4-6 hari\n• Original Character (OC): 5-8 hari\n• Couple: 6-8 hari\n• Cover buku/novel: 7-10 hari\n• Poster: 7-10 hari\n\nSemua dihitung dari DP masuk ya, bukan dari tanggal diskusi 😊\nMakin lengkap referensi yang kamu kasih, makin cepet prosesnya!\n\nMau tanya timeline untuk tipe tertentu?";
    }

    private function detectPricing(string $lower, string $originalMessage): ?array
    {
        $map = [
            'chibi'              => 'chibi',
            'couple'             => 'couple',
            'cover'              => 'cover',
            'poster'             => 'poster',
            'fanart'             => 'fanart',
            'fan art'            => 'fanart',
            'oc'                 => 'oc',
            'original character' => 'oc',
            'full body'          => 'full body',
            'fullbody'           => 'full body',
            'half body'          => 'half body',
            'halfbody'           => 'half body',
            'setengah badan'     => 'half body',
            'bust'               => 'bust',
        ];

        foreach ($map as $keyword => $type) {
            if (str_contains($lower, $keyword) && isset($this->pricing[$type])) {
                $p   = $this->pricing[$type];
                $min = number_format($p['min'], 0, ',', '.');
                $max = number_format($p['max'], 0, ',', '.');

                return [
                    'estimasi' => "📊 Estimasi {$type}:\n• Harga: Rp{$min} – Rp{$max}\n• Timeline: {$p['timeline']}\n• +BG simple Rp50k, complex Rp100-150k\n• Revisi 2x include ✨\n\nCocok? Langsung lanjut ke WA ya 👇",
                    'wa_link'  => $this->generateWaLink($originalMessage, $type),
                ];
            }
        }

        return null;
    }

    private function isOffTopic(string $message): bool
    {
        $offTopicKeywords = [
            // Politik & pemerintahan
            'jokowi', 'presiden', 'politik', 'prabowo', 'gubernur', 'pilpres',
            'pemilu', 'partai', 'dpr', 'mpr', 'dprd', 'menteri', 'anggota dewan',
            'korupsi', 'kpk', 'mahkamah', 'konstitusi', 'undang-undang', 'peraturan',
            // Tech & coding
            'coding', 'programming', 'website', 'aplikasi', 'android',
            'flutter', 'laravel', 'react', 'javascript', 'python', 'php',
            'database', 'server', 'hosting', 'domain', 'api', 'backend',
            // Berita & hiburan
            'berita', 'gosip', 'artis', 'drakor', 'netflix', 'gossip',
            'sinetron', 'ftv', 'youtube', 'tiktok viral', 'trending',
            'spotify', 'lagu', 'lirik', 'chord', 'musisi', 'band',
            // Makanan
            'resep', 'masak', 'makanan', 'makan', 'kuliner', 'restoran',
            'menu', 'bumbu', 'cara masak', 'resepi',
            // Random
            'cuaca', 'ramalan', 'zodiak', 'togel', 'saham', 'crypto', 'judol',
            'forex', 'investasi', 'nft', 'bitcoin', 'ethereum',
            'siapa kamu', 'kamu siapa', 'kamu ai', 'kamu robot', 'kamu manusia',
            'kamu gpt', 'chatgpt', 'openai', 'gemini', 'bard',
            'olahraga', 'bola', 'basket', 'badminton', 'voli',
            'pelajaran', 'pr sekolah', 'tugas sekolah', 'matematika', 'fisika',
            'biologi', 'kimia', 'sejarah', 'geografi',
            'kesehatan', 'dokter', 'obat', 'sakit', 'penyakit',
        ];

        return $this->containsAny($message, $offTopicKeywords);
    }

    private function askAI(string $message, array $history): string
    {
        $historyText = '';
        foreach (array_slice($history, -6) as $h) {
            $role         = $h['role'] === 'user' ? 'Client' : 'Jiro';
            $historyText .= "{$role}: {$h['content']}\n";
        }

        $prompt = <<<PROMPT
<s>[INST]
Kamu adalah Jiro, admin ilustrasi commission dari @Shxttyjiro.
Kamu artist yang asik, santai, fun, dan jago closing.
Gaya ngobrol: casual Indonesia banget, kayak DM Instagram sama temen, emoji secukupnya, pakai kata-kata gaul Indonesia yang natural.
Contoh kata yang bisa dipakai: "sabi", "gaskeun", "mantul", "cuy", "wkwk", "nggak", "dong", "kuy", "deh", "sih", "nih", "loh", "kan", "gitu", "anjir", "gokil", "keren banget", "kece", "mantap", "jos", "top", "asik", "seru", "menarik nih", "uwu", "owo".
Jangan formal sama sekali. Max 5-6 baris pendek. Jangan tulis HTML.

Layanan: Chibi, Anime style, Fan Art, Original Character (OC), Cover buku/novel, Poster.
Timeline: Chibi/Bust 3-5 hari, Half body 4-6 hari, Full body/Anime 5-7 hari, OC 5-8 hari, Couple 6-8 hari, Cover/Poster 7-10 hari.

Kalau user cerita konsep → validasi konsepnya dengan antusias, puji, kasih 1 saran kreatif, ajak lanjut.
Kalau user tanya timeline/estimasi waktu → jawab sesuai tipe yang disebutkan.
Kalau user belum jelas → tanya 1-2 hal penting aja (tipe, style, jumlah karakter).
Kalau di luar topik → arahkan balik ke commission dengan ramah dan lucu.

{$historyText}Client: {$message}
Jiro:[/INST]
PROMPT;

        $response = Http::withToken(env('HF_API_KEY'))
            ->timeout(60)
            ->post('https://api-inference.huggingface.co/models/mistralai/Mistral-7B-Instruct-v0.2', [
                'inputs'     => $prompt,
                'parameters' => [
                    'temperature'      => 0.9,
                    'max_new_tokens'   => 200,
                    'return_full_text' => false,
                ],
            ]);

        if (!$response->ok()) return $this->fallbackReply();

        $text = $response->json()[0]['generated_text'] ?? '';
        $text = strip_tags(trim($text));
        $text = preg_replace('/^(Jiro:|Admin:|Assistant:)/i', '', $text);

        return trim($text) ?: $this->fallbackReply();
    }

    private function hardClose(string $message): array
    {
        $replies = [
            "🔥 Gaskeun!\n\nBiar lebih gampang diskusi detail & kirim referensi, langsung WA aja ya 👇\n\n⏳ Slot commission terbatas tiap minggu, jangan sampe keisi duluan!",
            "Sabi! 🎉\n\nYuk lanjut ke WA biar bisa diskusi lebih detail & langsung kirim ref 👇\n\n⚡ Slot minggu ini masih ada, tapi nggak banyak!",
            "Deal dong! 🙌\n\nLangsung ke WA aja biar prosesnya makin cepet ya 👇\n\n✨ Aku excited ngerjain project kamu!",
            "Mantul! 🔥\n\nYuk gas ke WA biar bisa langsung diskusi detail & kirim referensi 👇\n\n⚡ Jangan lama-lama, slot terbatas!",
            "Sip banget! 🎊\n\nLangsung WA aja ya biar makin sat set 👇\n\n🎨 Aku udah gatel pengen ngerjain ini!",
            "Gokil, gas! 🚀\n\nKe WA dulu yuk biar aku bisa minta detail lengkapnya 👇\n\n⏳ Slot lagi dikit nih!",
        ];

        return [
            'reply'   => $replies[array_rand($replies)],
            'wa_link' => $this->generateWaLink($message),
        ];
    }

    private function priceList(): string
    {
        $list   = "💰 Range harga commission:\n\n";
        $labels = [
            'chibi'     => 'Chibi',
            'bust'      => 'Bust up',
            'half body' => 'Half body',
            'full body' => 'Full body',
            'couple'    => 'Couple',
            'fanart'    => 'Fan Art',
            'oc'        => 'Original Character (OC)',
            'cover'     => 'Cover buku/novel',
            'poster'    => 'Poster',
        ];
        foreach ($labels as $key => $label) {
            $p    = $this->pricing[$key];
            $min  = number_format($p['min'], 0, ',', '.');
            $max  = number_format($p['max'], 0, ',', '.');
            $list .= "• {$label}: Rp{$min} – Rp{$max} ({$p['timeline']})\n";
        }
        $list .= "\nSemua include revisi 2x ✨\nBG & karakter tambahan extra.\n\nCeritain konsepnya biar aku bisa estimasi lebih akurat! 👀";
        return $list;
    }

    private function greetingFull(): string
    {
        $greetings = [
            "Heyy, hai! 👋✨\n\nAku Jiro, ilustrator commission 🎨\nSiap bantu bikin:\n• Chibi\n• Anime style\n• Fan Art\n• Original Character (OC)\n• Cover buku/novel\n• Poster\n\nCeritain konsep kamu, nanti kita diskusi bareng sampe deal! 😎🔥",
            "Hai hai! ✨👋\n\nAku Jiro — ilustrator yang siap wujudin konsep kamu jadi gambar kece 🎨\n\nBisa bikin:\n• Chibi 🐣\n• Anime style 🌸\n• Fan Art 🎭\n• OC (Original Character) ✨\n• Cover novel/buku 📖\n• Poster 🖼️\n\nMau bikin apa? Cerita deh! 😊",
            "Halo kak, selamat datang! 🎉\n\nAku Jiro, artist commission yang siap ngebantu kamu 🎨\nAda yang pengen dipesenin?\n\n• Chibi 🐣\n• Anime style 🌸\n• Fan Art 🎭\n• OC & couple\n• Cover / Poster\n\nGas cerita konsepnya, kita obrolin bareng! 🔥",
            "Yooo! Selamat datang di komishan Jiro 🎨✨\n\nAku bisa bantu wujudin:\n• OC kamu\n• Fanart karakter favorit\n• Cover novel/buku yang kece\n• Chibi cute\n• Dan masih banyak lagi!\n\nCerita dong, mau gambar apa? 👀",
        ];
        return $greetings[array_rand($greetings)];
    }

    private function greetingShort(): string
    {
        $replies = [
            "Halo lagi! 👋 Ada yang mau ditanyain atau lanjut diskusi konsep? 😊",
            "Heyy! 😎 Mau lanjut atau ada yang kurang jelas?",
            "Hi hi! ✨ Ada lagi yang bisa aku bantu?",
            "Halo kak! 👋 Siap bantu lagi 🔥",
            "Eh balik lagi! 😄 Ada yang bisa aku bantu nih?",
            "Haloo! ✨ Mau diskusi konsep atau ada pertanyaan?",
            "Heyy ada apa nih? 😊 Gas cerita aja!",
            "Yoo! 🔥 Lanjut diskusi atau ada yang mau ditanyain?",
            "Wah balik lagi! 😄 Mau gas order atau nanya-nanya dulu? 👀",
        ];
        return $replies[array_rand($replies)];
    }

    private function fallbackReply(): string
    {
        $replies = [
            "Wah seru nih! 👀 Ceritain lebih detail dong — style apa yang kamu bayangin?",
            "Konsepnya menarik! 🎨 Mau aku bantu arahin ke style yang cocok?",
            "Oke noted! Kalau boleh tau, ini buat keperluan apa? (personal / hadiah / project?) biar aku bisa kasih saran yang pas 😊",
            "Boleh jelasin sedikit lagi? 😄 Biar aku bisa bantu lebih optimal!",
            "Ooh kayaknya seru nih! 👀 Mau pake style apa? Anime, chibi, atau yang lain?",
            "Noted! Karakternya berapa orang? Sama ada bayangin background atau polos aja? 😊",
            "Wih konsepnya gokil nih! 🔥 Kira-kira mau full body atau half body?",
            "Asik banget tuh idenya! 👀 Buat keperluan apa nih, biar aku bisa rekomendasiin style yang paling pas?",
            "Uwu menarik banget! ✨ Mau tau estimasi harganya langsung atau mau diskusi konsep dulu?",
        ];
        return $replies[array_rand($replies)];
    }

    private function generateWaLink(string $message, string $type = ''): string
    {
        $phone     = "6285887807176";
        $typeLabel = $type ? strtoupper($type) : 'ilustrasi';
        $autoText  = "Halo kak Jiro 👋\n\n";
        $autoText .= "Saya dari website, mau order {$typeLabel} commission nih!\n\n";
        $autoText .= "📋 Detail request saya:\n{$message}\n\n";
        $autoText .= "Boleh minta konfirmasi harga & timeline nya? 🙏";
        return "https://wa.me/{$phone}?text=" . urlencode($autoText);
    }

    private function containsAny(string $haystack, array $needles): bool
    {
        foreach ($needles as $needle) {
            if (str_contains($haystack, $needle)) return true;
        }
        return false;
    }

    private function isGreeting(string $message): bool
    {
        // Exact match dulu untuk kata super pendek yang rawan false positive
        $exactGreetings = ['hai', 'hi', 'hey', 'hei', 'yo', 'oi', 'oy', 'sup'];
        if (in_array(trim($message), $exactGreetings)) return true;

        // Untuk kata yang lebih panjang, pakai contains
        return $this->containsAny($message, [
            // Standar
            'halo', 'heyy', 'haloo', 'haii', 'hayy', 'hay', 'heyyy', 'heii',
            'helo', 'hello', 'helloo', 'halooo', 'haloha', 'haloooo',
            // Formal & waktu — hanya kalau diawali "selamat"
            'selamat pagi', 'selamat siang', 'selamat sore', 'selamat malam',
            'selamat datang',
            // Islami
            'assalamualaikum', 'waalaikumsalam', 'assalam',
            // Gaul internasional (versi panjang aja)
            'yoo', 'yooo', 'oii', 'waddup', 'wassup', 'wazzup', 'hola',
            // Sapaan dengan nama — ini aman karena spesifik
            'kak jiro', 'bang jiro', 'mas jiro',
            // Pembuka sopan
            'permisi', 'numpang tanya', 'numpang lewat', 'punten',
            'permisi kak', 'permisi bang', 'excuse me',
        ]);
    }
}