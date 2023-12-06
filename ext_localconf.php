<?php

defined('TYPO3') or die();

(function () {
    \TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
        $GLOBALS['TYPO3_CONF_VARS'],
        [
            'RTE' => [
                'Presets' => [
                    'minimal-input-field' => 'EXT:richtextinputfields/Configuration/RTE/Richtextinputfields.yaml',
                ],
            ],
        ]
    );
})();
