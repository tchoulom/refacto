<?php

namespace Refacto;

use Refacto\Builder\TemplateBuilder;
use Refacto\Entity\Quote;
use Refacto\Entity\Template;
use Refacto\Exception\RuntimeException;
use Refacto\Entity\User;
use Refacto\Handler\DestinationHandler;
use Refacto\Handler\QuoteHandler;
use Refacto\Handler\UserHandler;

class TemplateManager
{
    /**
     * @var TemplateBuilder
     */
    protected $templateBuilder;

    public function getTemplateComputed(Template $tpl, array $data)
    {
        if (!$tpl) {
            throw new RuntimeException('no tpl given.');
        }

        $tplCloned = clone($tpl);
        $this->computeText($tplCloned->getSubject(), $data);
        $this->computeText($tplCloned->getContent(), $data);

        $templateModel = $this->templateBuilder->buildTemplateModel($tplCloned);

        return $templateModel;
    }


    /**
     * Sets the TemplateBuilder.
     *
     * @param $templateBuilder
     *
     * @return $this
     */
    public function setTemplateBuilder($templateBuilder)
    {
        $this->templateBuilder = $templateBuilder;

        return $this;
    }

    /**
     * Computes the text.
     *
     * @param $text
     * @param array $data
     *
     * @return mixed
     */
    private function computeText($text, array $data)
    {
        $applicationContext = \ApplicationContext::getInstance();
        $quote = $data['quote'] instanceof Quote ?? null;

        $quoteFromRepository = \QuoteRepository::getInstance()->getById($quote->getId());
        $usefulObject = \SiteRepository::getInstance()->getById($quote->getSiteId());
        $destinationOfQuote = \DestinationRepository::getInstance()->getById($quote->getDestinationId());

        if ($quote instanceof Quote) {
            $text = $this->quoteHandler->doComputeText($text, $quoteFromRepository, $destinationOfQuote);
        }

        $text = $this->destinationHandler->doComputeText($text, $quoteFromRepository, $destinationOfQuote, $usefulObject);

        $user = $data['user'] instanceof User ?? $applicationContext->getCurrentUser();
        if ($user instanceof User) {
            $text = $this->userHandler->doComputeText($text, $user);
        }

        return $text;
    }

    /**
     * @param QuoteHandler $quoteHandler
     */
    public function setQuoteHandler(QuoteHandler $quoteHandler)
    {
        $this->quoteHandler = $quoteHandler;
    }

    /**
     * @param DestinationHandler $destinationHandler
     */
    public function setDestinationHandler(DestinationHandler $destinationHandler)
    {
        $this->destinationHandler = $destinationHandler;
    }

    /**
     * @param UserHandler $userHandler
     */
    public function setUserHandler(UserHandler $userHandler)
    {
        $this->userHandler = $userHandler;
    }
}
