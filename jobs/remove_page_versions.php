<?php
namespace Concrete\Package\RemovePageVersionsJob\Job;

use Concrete\Core\Page\Collection\Version\Version;
use Concrete\Core\Page\Collection\Version\VersionList;
use QueueableJob;
use ZendQueue\Queue as ZendQueue;
use ZendQueue\Message as ZendQueueMessage;
use Exception;
use Concrete\Core\Page\PageList;
use Concrete\Core\Page\Page;

class RemovePageVersions extends QueueableJob
{
    public $jSupportsQueue = true;

    public function getJobName()
    {
        return t('Remove All Old Page Versions');
    }
    public function getJobDescription()
    {
        return t('This job will remove all old page versions. It would be useful for those who ended up having too many versions of pages.');
    }
    public function start(ZendQueue $q)
    {
        $pl = new PageList;
        $pl->ignorePermissions();

        $pages = $pl->getResults();

        foreach ($pages as $page) {
            $q->send($page->getCollectionID());
        }
    }
    public function processQueueItem(ZendQueueMessage $msg)
    {
        try {
            $page = Page::getByID($msg->body);
            $pvl = new VersionList($page);
            foreach ($pvl->get() as $v) {
                if ($v instanceof Version && !$v->isApproved() && !$v->isMostRecent()) {
                    @$v->delete();
                }
            }
        } catch (Exception $e) {
            throw new Exception(t('Error occurred while getting the Page object of pID: %s', $msg->body));
        }
    }
    public function finish(ZendQueue $q)
    {
        return t('Finished removing all old page versions.');
    }
}