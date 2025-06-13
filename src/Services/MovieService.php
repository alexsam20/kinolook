<?php

namespace App\Services;

use App\Models\Movie;
use Kernel\Database\DatabaseInterface;
use Kernel\Upload\UploadedFileInterface;

readonly class MovieService
{
    public function __construct(
        private DatabaseInterface $db
    ) {
    }

    public function store(string $name, string $description, UploadedFileInterface $image, int $category): false|int
    {
        $filePath = $image->move('movies');

        return $this->db->insert('movies', [
            'name' => $name,
            'description' => $description,
            'preview' => $filePath,
            'category_id' => $category,
        ]);
    }

    public function all(): array
    {
        $movies = $this->db->get('movies');

        return array_map(static function ($movie) {
            return new Movie(
                $movie['id'],
                $movie['name'],
                $movie['description'],
                $movie['preview'],
                $movie['category_id'],
                $movie['created_at'],
            );
        }, $movies);
    }

    public function destroy(int $id): void
    {
        $this->db->delete('movies', [
            'id' => $id,
        ]);
    }

    public function find(int $id): ?Movie
    {
        $movie = $this->db->first('movies', [
            'id' => $id,
        ]);

        if (!$movie) {
            return null;
        }

        return new Movie(
            $movie['id'],
            $movie['name'],
            $movie['description'],
            $movie['preview'],
            $movie['category_id'],
            $movie['created_at'],
        /*$this->getReviews($id)*/
        );
    }

    public function update(int $id, string $name, string $description, ?UploadedFileInterface $image, int $category): void
    {
        $data = [
            'name' => $name,
            'description' => $description,
            'category_id' => $category,
        ];

        if ($image && !$image->hasError()) {
            $data['preview'] = $image->move('movies');
        }

        $this->db->update('movies', $data, [
            'id' => $id,
        ]);
    }

    public function new(): array
    {
        $movies = $this->db->get('movies', [], ['id' => 'DESC'], 10);

        return array_map(static function ($movie) {
            return new Movie(
                $movie['id'],
                $movie['name'],
                $movie['description'],
                $movie['preview'],
                $movie['category_id'],
                $movie['created_at'],
                //$this->getReviews($movie['id']) // FIXME: в данном случае это лишнее
            );
        }, $movies);
    }
}