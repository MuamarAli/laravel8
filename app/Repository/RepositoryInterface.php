<?php

namespace App\Repository;

/**
 * Interface RepositoryInterface
 *
 * @package App\Repository
 *
 * @author Ali, Muamar
 */
interface RepositoryInterface
{
    /**
     * Get all data.
     *
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function all();

    /**
     * Create data.
     *
     * @param array $data - data's of the model.
     *
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update data.
     *
     * @param int $id - id of the model.
     * @param array $data - data's of the model.
     *
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function update(int $id, array $data);

    /**
     * Delete data.
     *
     * @param int $id - id of the model.
     *
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function delete(int $id);

    /**
     * find data.
     *
     * @param int $id - id of the model.
     *
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function find(int $id);
}
