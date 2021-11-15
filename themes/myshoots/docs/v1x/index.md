## Server Requirements
These are the minimum server requirements, the installer will check if your server meets these or alternatively you can contact your hosting provider in order to make sure your server meets them.

- PHP Version >= 7.2.5
- PDO PHP Extension Enabled
- php_fileinfo Extension Enabled
- MySQL Database

## Install
- Search and active mymo theme
- Active require plugins
- Enjoy

## Update
- Go to your admin panel
- Dashboard -> Updates
- Click Update button click Update button
## Scheduled Tasks (CRON Jobs)
In order for Mymo to perform some scheduled tasks (like deleting temporary files and expired shareable links), you will need to set up a CRON job on your server.
You can usually create CRON jobs from your hosting's Cpanel. You should create a CRON job that calls the command below every minute:

```
php /path/to/source/folder/artisan schedule:run >> /dev/null 2>&1
```

**Important**:
Replace "**path/to/source/folder**" in the command above with path to source folder on your own server.

## Translating the Site
- Install and activate [plugin Translation](https://juzaweb.com/plugin/translation)
- Go to Admin -> Translations to translate theme

## TMDB Api
- Register themoviedb.org https://www.themoviedb.org/signup
- Login to your account
- Click **API » Create**
- Login to administrator dashboard.
- Goto Setting » Systems Setting
- Enter your Api Key to Api Key

