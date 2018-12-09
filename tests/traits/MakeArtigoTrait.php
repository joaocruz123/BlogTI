<?php

use Faker\Factory as Faker;
use App\Models\Artigo;
use App\Repositories\ArtigoRepository;

trait MakeArtigoTrait
{
    /**
     * Create fake instance of Artigo and save it in database
     *
     * @param array $artigoFields
     * @return Artigo
     */
    public function makeArtigo($artigoFields = [])
    {
        /** @var ArtigoRepository $artigoRepo */
        $artigoRepo = App::make(ArtigoRepository::class);
        $theme = $this->fakeArtigoData($artigoFields);
        return $artigoRepo->create($theme);
    }

    /**
     * Get fake instance of Artigo
     *
     * @param array $artigoFields
     * @return Artigo
     */
    public function fakeArtigo($artigoFields = [])
    {
        return new Artigo($this->fakeArtigoData($artigoFields));
    }

    /**
     * Get fake data of Artigo
     *
     * @param array $postFields
     * @return array
     */
    public function fakeArtigoData($artigoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'categoria_id' => $fake->randomDigitNotNull,
            'user_id' => $fake->randomDigitNotNull,
            'titulo' => $fake->word,
            'descricao' => $fake->word,
            'corpo' => $fake->word,
            'imagem' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $artigoFields);
    }
}
