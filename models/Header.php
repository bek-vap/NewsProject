<?php

class Header
{
    private string $file;

    public function __construct()
    {
        $this->file = __DIR__ . '/../data/header.json';
    }

    // Header maʼlumotlarini olish
    public function get(): array
    {
        if (!file_exists($this->file)) {
            return [
                'site_name' => 'News',
                'menu' => []
            ];
        }

        $data = json_decode(file_get_contents($this->file), true);

        if (!is_array($data)) {
            return [
                'site_name' => 'News',
                'menu' => []
            ];
        }

        return $data;
    }

    // Header saqlash (admin tomoni)
    public function save(string $siteName, array $menu): void
    {
        $data = [
            'site_name' => $siteName,
            'menu' => $menu
        ];

        $this->ensureDir();
        file_put_contents(
            $this->file,
            json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
        );
    }

    // Default header yaratish (agar yo‘q bo‘lsa)
    public function createDefault(): void
    {
        if (file_exists($this->file)) {
            return;
        }

        $default = [
            'site_name' => 'News Project',
            'menu' => [
                [
                    'title' => 'Bosh sahifa',
                    'link' => 'index.php'
                ],
                [
                    'title' => 'Yangiliklar',
                    'link' => 'index.php?page=news'
                ]
            ]
        ];

        $this->ensureDir();
        file_put_contents(
            $this->file,
            json_encode($default, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
        );
    }

    // Papkani tekshirish
    private function ensureDir(): void
    {
        $dir = dirname($this->file);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
    }
}
