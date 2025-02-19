<?php

declare(strict_types=1);

namespace B13\Richtextinputfields\EventListener;

use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Core\Html\Event\AfterTransformTextForPersistenceEvent;

#[AsEventListener(
    identifier: 'b13/richtextinputfields/afterTransformTextForPersistence'
)]
class AfterTransformTextForPersistence
{
    public function __invoke(AfterTransformTextForPersistenceEvent $event): void
    {
        // this replace ckeditor 4 configurations:
        // enterMode: 2 # <br> instead of <p>
        // autoParagraph: false
        $config = $event->getProcessingConfiguration();
        if ((bool)($config['plainRichText'] ?? false) === false) {
            return;
        }
        $content = $event->getHtmlContent();
        $pattern = '/<p(.*?)>((.*?)+)\<\/p>/';
        $matches = [];
        $cnt = preg_match_all($pattern, $content, $matches);
        if ($cnt > 0) {
            $event->setHtmlContent(implode('<br>', $matches[2]));
        }
    }

}
