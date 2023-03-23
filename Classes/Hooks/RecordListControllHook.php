<?php
declare(strict_types=1);

namespace Hyperdigital\HdTranslator\Hooks;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

class RecordListControllHook
{
    /**
     * @param $table - table[0] = tablename, table[1] = uid of row
     * @param $rowUid
     * @return string
     * @throws \TYPO3\CMS\Backend\Routing\Exception\RouteNotFoundException
     */
    public function defaultControl($table, $rowUid)
    {
        $uriBuilder = GeneralUtility::makeInstance(\TYPO3\CMS\Backend\Routing\UriBuilder::class);
        $uri = $uriBuilder->buildUriFromRoutePath(
            '/module/web/HdTranslatorHdTranslatorEngine',
            [
                'tx_hdtranslator_web_hdtranslatorhdtranslatorengine' => [
                    'action' => 'exportTableRowIndex',
                    'controller' => 'Be\Translator',
                    'tablename' => $table[0],
                    'rowUid' => (int) $table[1]
                ]
            ]
        );

        $label = LocalizationUtility::translate('LLL:EXT:hd_translator/Resources/Private/Language/locallang_be.xlf:control.exportTranslation');
        return '<a href="'.$uri.'" target="_top" class="dropdown-item" aria-label="'.$label.'">
<span class="t3js-icon icon icon-size-small icon-state-default icon-actions-document-info" data-identifier="actions-document-info">
	<span class="icon-markup">
	    <svg class="icon-color" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="m8 2.3652c-2.505 0-4.3935 1.5188-5.2051 3.4785-.81162 1.9597-.55038 4.3695 1.2207 6.1406s4.1809 2.0323 6.1406 1.2207c1.9597-.81162 3.4785-2.7001 3.4785-5.2051 0-3.1106-2.5241-5.6348-5.6348-5.6348zm-1.0547 1.1113c-.45672.64608-.83942 1.3404-1.0781 2.0957-.52071-.10777-1.0296-.26434-1.5273-.45117.6537-.83867 1.5716-1.405 2.6055-1.6445zm2.1094 0c1.0339.2395 1.9518.80587 2.6055 1.6445-.49773.18683-1.0066.34341-1.5273.45117-.24183-.75357-.62412-1.4485-1.0781-2.0957zm-1.0547.13281c.51117.62602.9077 1.3338 1.1719 2.0977-.7795.087667-1.5643.087667-2.3438 0 .26418-.76386.6607-1.4716 1.1719-2.0977zm-4.1836 2.3184c.58014.23776 1.1788.427 1.791.5625-.20138.99971-.20112 2.0276 0 3.0273-.61223.13254-1.2104.32171-1.791.55664-.32118-.64637-.51119-1.3515-.51172-2.0742.000525-.72204.1911-1.4264.51172-2.0723zm8.3379 0c.64959 1.3091.64778 2.8355-.002 4.1445-.58051-.23472-1.1789-.4223-1.791-.55469.1964-.99915.1964-2.0262 0-3.0254.61303-.13554 1.2121-.32639 1.793-.56445zm-5.5918.70703c.4764.063707.95484.10534 1.4355.10938h.0039031c.48071-.00404.95915-.045668 1.4355-.10938.17769.90579.17921 1.8366 0 2.7422-.95544-.11771-1.9196-.11771-2.875 0-.17921-.90556-.17769-1.8364 0-2.7422zm.26562 3.6582c.7795-.08767 1.5643-.08767 2.3438 0-.26418.76386-.6607 1.4716-1.1719 2.0977-.51117-.62602-.9077-1.3338-1.1719-2.0977zm-.96094.13476c.24183.75358.62412 1.4485 1.0781 2.0957-1.0339-.2395-1.9518-.80587-2.6055-1.6445.49773-.18683 1.0066-.3434 1.5273-.45117zm4.2656 0c.52071.10777 1.0296.26434 1.5273.45117-.6537.83867-1.5716 1.405-2.6055 1.6445.454-.64725.83629-1.3421 1.0781-2.0957z" color="#000000" fill="#ffffff" stroke-miterlimit="10" style="-inkscape-stroke:none"/></svg>
    </span>
</span>
</a>';
    }
}