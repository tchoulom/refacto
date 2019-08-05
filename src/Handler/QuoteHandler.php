<?php

namespace Refacto\Handler;

class QuoteHandler
{
    /**
     * @param $text
     * @param $quoteFromRepository
     * @param $destinationOfQuote
     * @return mixed
     */
    public function doComputeText($text, $quoteFromRepository, $destinationOfQuote)
    {
        $containsSummaryHtml = strpos($text, '[quote:summary_html]');
        $containsSummary = strpos($text, '[quote:summary]');

        if ($containsSummaryHtml !== false || $containsSummary !== false) {
            if ($containsSummaryHtml !== false) {
                $text = str_replace(
                    '[quote:summary_html]',
                    Quote::renderHtml($quoteFromRepository),
                    $text
                );
            }
            if ($containsSummary !== false) {
                $text = str_replace(
                    '[quote:summary]',
                    Quote::renderText($quoteFromRepository),
                    $text
                );
            }
        }

        (strpos($text, '[quote:destination_name]') !== false) && $text = str_replace('[quote:destination_name]', $destinationOfQuote->getCountryName(), $text);

        return $text;
    }
}
