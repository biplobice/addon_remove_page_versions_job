# Remove Old Page Versions Job - delete all old page versions of your concrete5 site

When you are building a concrete5 site, sometime, you ended up leaving tons of page versions.

You don't want to waste your time clicking and removing them one by one.

When you install this add-on, it will add a very simple but **dangerous** job to erase all old page versions in your site.

## How to Install

1. Download zip files from GitHub, or check it out from the Marketplace(in near future).
    1. Download zip file from the marketplace or GitHub
        1. Download & unzip the zip file
        2. Make sure that folder name is *remove_page_versions_job*
        3. Upload the folder under the packages folder of concrete5.
        4. Log on to concrete5 site as admin who can install packages.
    2. From Marketplace
        1. Log on to concrete5 site as admin who can install packages
        2. Connect your site to the marketplace if you haven't done so by going to *Dashboard* - *Extend concrete5* menu.
        3. Visit concrete5 Marketplace and check out this add-on and assign your concrete5 site.
    3. Using Git
        ```bash
        $ cd ./packages
        $ git clone git@github.com:biplobice/addon_remove_page_versions_job.git remove_page_versions_job
        $ cd ../
        $ ./concrete/bin/concrete5 c5:package-install remove_page_versions_job
2. Go to *Dashboard*, and then *Extend concrete5*
3. Find **Remove Page Versions Job** package in the list, and install it.

## How to Run

1. Go to *Dashboard* - *System & Settings* - *Optimization* - *Automated Jobs*
2. Find a job named, **"Remove All Old Page Versions"** and click **"Run"**.
3. Now sit back and relax to finish rescanning all files.

## GitHub & Open Source

This project is on GitHub. This package is released under MIT License.

https://github.com/biplobice/addon_remove_page_versions_job


## Credit

- Katz Ueno (Program, @katzueno, concrete5, Japan, Inc.)
- Biplob Hossain (Program, @biplobice, concrete5, Japan, Inc.)

## Screenshots
![Screen1](https://raw.githubusercontent.com/biplobice/addon_remove_page_versions_job/master/screenshots/screen-1.png)