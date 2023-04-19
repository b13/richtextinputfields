<?php

declare(strict_types=1);

namespace B13\Richtextinputfields\EventListener;

use TYPO3\CMS\RteCKEditor\Form\Element\Event\AfterPrepareConfigurationForEditorEvent;

/**
 * Add some TCA features for input fields into RTE.
 *
 * RTE can limit input based on a count, just like TCA 'max' property.
 */
class TcaToRteConfiguration
{
    public function __invoke(AfterPrepareConfigurationForEditorEvent $event): void
    {
        $rteConfiguration = $event->getConfiguration();
        $fieldConfiguration = $event->getData()['parameterArray']['fieldConf']['config'] ?? [];

        $rteConfiguration = $this->setRows($rteConfiguration, $fieldConfiguration);
        $rteConfiguration = $this->setMax($rteConfiguration, $fieldConfiguration);

        $event->setConfiguration($rteConfiguration);
    }

    private function setRows(array $rteConfiguration, array $fieldConfiguration): array
    {
        $rows = $fieldConfiguration['rows'] ?? 0;

        if ($rows > 0) {
            $rteConfiguration['height'] = ($rows * 4) . 'rem';
        }

        return $rteConfiguration;
    }

    private function setMax(array $rteConfiguration, array $fieldConfiguration): array
    {
        $max = $fieldConfiguration['max'] ?? 0;

        if ($max > 0) {
            $rteConfiguration['wordcount']['maxCharCount'] = (int) $max;
        }

        return $rteConfiguration;
    }
}
