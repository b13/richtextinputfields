<?php

defined('TYPO3_MODE') or die();

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
