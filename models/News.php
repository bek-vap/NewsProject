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

    public function getAll(): array
    {
        $data = file_get_contents($this->file);
        return json_decode($data, true) ?? [];
    }

    public function getById(int $id): ?array
    {
        $news = $this->getAll();

        foreach ($news as $item) {
            if ($item['id'] == $id) {
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

        file_put_contents(
            $this->file,
            json_encode($news, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );
    }


    public function delete(int $id): void
    {
        $news = $this->getAll();

        $news = array_filter($news, function ($item) use ($id) {
            return $item['id'] != $id;
        });

        file_put_contents(
            $this->file,
            json_encode(array_values($news), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );
    }
}
