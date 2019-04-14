<?php

namespace Railken\Amethyst\Schemas;

use Railken\Lem\Attributes;
use Railken\Lem\Schema;

class ValueSchema extends Schema
{
    /**
     * Get all the attributes.
     *
     * @var array
     */
    public function getAttributes()
    {
        return [
            Attributes\IdAttribute::make(),
            \Railken\Amethyst\Attributes\TaxonomyAttribute::make('key_id', app('amethyst.taxonomy')->get('value.key'))
                ->setRelationName('key')
                ->setRequired(true),
            Attributes\EnumAttribute::make('valuable_type', app('amethyst')->getMorphListable('value', 'valuable')),
            Attributes\MorphToAttribute::make('valuable_id')
                ->setRelationKey('valuable_type')
                ->setRelationName('valuable')
                ->setRelations(app('amethyst')->getMorphRelationable('value', 'valuable')),
            Attributes\TextAttribute::make('value')
                ->setRequired(true),
            Attributes\CreatedAtAttribute::make(),
            Attributes\UpdatedAtAttribute::make(),
            Attributes\DeletedAtAttribute::make(),
        ];
    }
}
