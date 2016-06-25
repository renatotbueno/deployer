<?php

namespace REBELinBLUE\Deployer\Repositories;

use REBELinBLUE\Deployer\Contracts\Repositories\TemplateRepositoryInterface;
use REBELinBLUE\Deployer\Template;

/**
 * The template repository.
 */
class EloquentTemplateRepository extends EloquentRepository implements TemplateRepositoryInterface
{
    /**
     * EloquentTemplateRepository constructor.
     *
     * @param Template $model
     */
    public function __construct(Template $model)
    {
        $this->model = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function getAll()
    {
        return $this->model
                    ->templates()
                    ->orderBy('name')
                    ->get();
    }

    /**
     * Overwrite the parent method to add the requires fields.
     *
     * {@inheritdoc}
     * @todo Why is this here?
     */
    public function create(array $fields)
    {
        return parent::create($fields);
    }
}
