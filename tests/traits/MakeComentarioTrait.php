<?php

use Faker\Factory as Faker;
use App\Models\Comentario;
use App\Repositories\ComentarioRepository;

trait MakeComentarioTrait
{
    /**
     * Create fake instance of Comentario and save it in database
     *
     * @param array $comentarioFields
     * @return Comentario
     */
    public function makeComentario($comentarioFields = [])
    {
        /** @var ComentarioRepository $comentarioRepo */
        $comentarioRepo = App::make(ComentarioRepository::class);
        $theme = $this->fakeComentarioData($comentarioFields);
        return $comentarioRepo->create($theme);
    }

    /**
     * Get fake instance of Comentario
     *
     * @param array $comentarioFields
     * @return Comentario
     */
    public function fakeComentario($comentarioFields = [])
    {
        return new Comentario($this->fakeComentarioData($comentarioFields));
    }

    /**
     * Get fake data of Comentario
     *
     * @param array $postFields
     * @return array
     */
    public function fakeComentarioData($comentarioFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'artigo_id' => $fake->randomDigitNotNull,
            'content' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $comentarioFields);
    }
}
