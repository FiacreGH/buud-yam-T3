<?php
namespace Ecodev\Speciality\ViewHelpers\Newsletter;

/*
 * This file is part of the Ecodev/Speciality project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use Fab\Vidi\Domain\Repository\ContentRepositoryFactory;
use Fab\Vidi\Persistence\Matcher;
use Fab\Vidi\Persistence\Order;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class FindViewHelper
 */
class FindViewHelper extends AbstractViewHelper
{

    /**
     * @return array
     */
    public function render()
    {
        $pageRepository = ContentRepositoryFactory::getInstance('pages');
        /** @var Matcher $matcher */
        $matcher = GeneralUtility::makeInstance(Matcher::class);
        $matcher->equals('pid', 136);
        $matcher->equals('doktype', 1); // we want only standard page.

        /** @var Order $order */
        $order = GeneralUtility::makeInstance(Order::class);
        $order->addOrdering('sorting', 'ASC');
        $objects = $pageRepository->findBy($matcher, $order);

        $pages = [];
        foreach ($objects as $object) {
            preg_match('/[0-9]{4}$/', $object['title'], $matches);
            if (!empty($matches)) {
                $pages[] = [
                    'uid' => $object['uid'],
                    'title' => $object['title'],
                    'abstract' => $object['abstract'] ? '<br /> ' . nl2br($object['abstract']) : '',
                    'year' => $matches[0],
                ];
            }
        }

        return $pages;
    }

}
