<?php

namespace Refacto\Builder;

use Refacto\Model\Template as TemplateModel;

/**
 * Class TemplateBuilder
 */
class TemplateBuilder
{
    protected $templateEntity;

    /**
     * Builds the template model.
     *
     * @param $templateEntity
     *
     * @return TemplateModel
     */
    public function buildTemplateModel($templateEntity)
    {
        $templateModel = new TemplateModel($templateEntity->getId(), $templateEntity->getSubject(), $templateEntity->getContent());

        return $templateModel;
    }
}
