<?php
namespace Concrete\Package\RemovePageVersionsJob;

use Concrete\Core\Package\Package;
use Job;

class Controller extends Package
{
    protected $pkgHandle = 'remove_page_versions_job';
    protected $appVersionRequired = '5.7';
    protected $pkgVersion = '0.1';
    protected $pkgAutoLoaderMapCoreExtensions = true;

    public function getPackageDescription()
    {
        return t('This is a simple job package to remove all old page versions. It would be useful for those who ended up having too many versions of pages.');
    }
    public function getPackageName()
    {
        return t('Remove Page Versions Job');
    }
    public function install()
    {
        $pkg = parent::install();
        $this->installJobs($pkg);
    }
    public function upgrade()
    {
        $pkg = parent::upgrade();
        $this->installJobs($pkg);
    }
    protected function installJobs($pkg)
    {
        $jobHandle = 'remove_page_versions';
        $job = Job::getByHandle($jobHandle);
        if (!is_object($job)) {
            Job::installByPackage($jobHandle, $pkg);
        }
    }
}