<?php

namespace App\Services;

use App\Http\Requests\ArticleRequest;

/**
 * Class ArticleService
 *
 * @package App\Services
 */
class ArticleService
{
    /**
     * @param array $attributes
     *
     * @return array
     */
    public function create(array $attributes): ?array
    {
        return $attributes;
    }

    /**
     * @param array $attributes
     *
     * @return array
     */
    public function update(array $attributes): ?array
    {
        return $attributes;
    }
}
