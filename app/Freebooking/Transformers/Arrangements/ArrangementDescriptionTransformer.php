<?php

namespace App\Freebooking\Transformers\Arrangements;

use App\Freebooking\Transformers\Transformer;

class ArrangementDescriptionTransformer extends Transformer
{
    public function transform($arrangementDescription)
    {


        return [
                "id"                             => $arrangementDescription->id,
                "arrangement_id"                 => $arrangementDescription->arrangement_id,
                "description"                    => $arrangementDescription->description,
                "language"                       => $arrangementDescription->language,
        ];

    }
}