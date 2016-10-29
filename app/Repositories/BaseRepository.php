<?php

namespace TeachMe\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * @return Model
     */
    abstract public function getModel();

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery()
    {
        return $this->getModel()->newQuery();
    }

    /**
     * @param $id
     * @param null $with
     * @return \Illuminate\Database\Eloquent\Collection|Model
     */
    public function findOrFail($id, $with = null)
    {
        $q = $this->newQuery();

        if ( ! is_null($with)) {
            $q->with($with);
        }
        return $q->findOrFail($id);
        //return Ticket::with('comments.user')->findOrFail($id);
    }
}