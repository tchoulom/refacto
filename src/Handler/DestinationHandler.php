<?php

namespace Refacto\Handler;

class DestinationHandler
{
    /**
     * @param $text
     * @param $quoteFromRepository
     * @param $destination
     * @param $usefulObject
     * @return mixed
     */
    public function doComputeText($text, $quoteFromRepository, $destination, $usefulObject)
    {
        if (isset($destination)) {
            $text = str_replace('[quote:destination_link]', $usefulObject->url . '/' . $destination->getCountryName() . '/quote/' . $quoteFromRepository->getId(), $text);
        } else {
            $text = str_replace('[quote:destination_link]', '', $text);
        }

        return $text;
    }
}
