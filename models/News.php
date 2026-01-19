<?php

class News
{
    private string $file;

    public function __construct()
    {
        $this->file = __DIR__ . '/../data/news.json';

        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([], JSON_PRETTY_PRINT));
        }
    }

    // ===== ASOSIY METODLAR =====

    public function getAll(): array
    {
        $data = file_get_contents($this->file);
        return json_decode($data, true) ?? [];
    }

    public function getById(int $id): ?array
    {
        $news = $this->getAll();

        foreach ($news as $item) {
            if ((int)$item['id'] === $id) {
                return $item;
            }
        }

        return null;
    }

    public function create(string $title, string $content): void
    {
        $news = $this->getAll();

        $news[] = [
            'id'      => time(),
            'title'   => $title,
            'content' => $content,
            'date'    => date('Y-m-d H:i:s')
        ];

        $this->saveAll($news);
    }

    public function delete(int $id): void
    {
        $news = $this->getAll();

        $news = array_filter($news, function ($item) use ($id) {
            return (int)$item['id'] !== $id;
        });

        $this->saveAll(array_values($news));
    }

    // ===== CONTROLLER MOSLIGI UCHUN ALIASLAR =====
    // Endi NewsController'dagi all(), find(), update() xato bermaydi

    public function all(): array
    {
        return $this->getAll();
    }

    public function find($id): ?array
    {
        return $this->getById((int)$id);
    }

    public function update($id, $title, $content): void
    {
        $news = $this->getAll();

        foreach ($news as &$item) {
            if ((int)$item['id'] === (int)$id) {
                $item['title'] = $title;
                $item['content'] = $content;
                break;
            }
        }

        unset($item);
        $this->saveAll($news);
    }

    // ===== YORDAMCHI =====
    private function saveAll(array $news): void
    {
        file_put_contents(
            $this->file,
            json_encode($news, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );
    }
}
