# fairmeeting integration for nextcloud

This app integrates the fairmeeting video conferencing service into Nextcloud. fairmeeting is based on Jitsi but hosted in the EU, thus fully GDPR compliant. We have set fairmeeting.net as the default Jitsi server, as meet.jit.si requires additional login or a token and is limited to 5 minutes in embedded conferences since 2023.

## Features

- 🎥 Full featured online conferences in Nextcloud
- 🔗 Sharable conference room links
- 🔎 Shows conference rooms in the global search
- ✅ Audio and video test before joining a conference
- 💯 up to hundreds of users
- 🖼 background image
- 👏 interactions with emojis and animated gifs among users
- 👩🏼‍🏫 organiser is moderator, who can assign moderation rights to others

## Sources & FAQs

- app was forked from https://github.com/nextcloud/jitsi (great work, we have improved some issues)
- code on github: https://github.com/fairkom/nextcloud-fairmeeting-integration
- code on gitlab: https://git.fairkom.net/hosting/fairkom/nextcloud_fairmeeting
- optimized for: https://www.fairkom.eu/en/fairmeeting (with desktop apps)
- fairmeeting faqs: https://git.fairkom.net/hosting/fairmeeting/-/wikis/home

## Usage of fairmeeting conferencing servers

The default server is [fairmeeting.net](https://fairmeeting.net). It runs on a scalable kubernetes cloud infrastructure and is managed by [fairkom](https://fairkom.eu).

Fair Use = private occasional usage. Please consider a [donation](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=N8PYR9YWQHVE8&source=url) to cover their server costs.

If you use fairmeeting on a regular basis or for commercial purposes, you need to [order a pro plan](https://shop.fairkom.net/paketevergleich/).

## Setup with your own Jitsi server

You also can run this up with a dedicated Jitsi instance. Further instructions how to set that up can be found in the [Jitsi setup doc](https://jitsi.github.io/handbook/docs/devops-guide/devops-guide-start). It requires some know-how and experience with networks, TURN server and port management.

🔒 If the Jitsi instance is secured via JSON Web Token, you can enter that to the app settings.
Information about tokens can be found in the [Jitsi authentication doc](https://jitsi.github.io/handbook/docs/devops-guide/devops-guide-docker#authentication).

Nextcloud setup and configuration:

- Install the Nextcloud fairmeeting app
- Go to _Settings_ → _fairmeeting_ and enter your own server URL (and JWT secret)
- Start conferencing 🍻

## Issues

Report issues and feature requests [here](https://git.fairkom.net/hosting/fairkom/nextcloud_fairmeeting/-/issues).

## Setting up a dev instance

- use nextcloud developer docker: https://github.com/juliushaertl/nextcloud-docker-dev
- in repo folder do `composer install`, `npm install` and `npm run build` (in a manual installed env, you might do all with `sudo -u www-data`)
- at initial fork we used v28 because the nextcloud jitsi app was only available for stable28 (https://juliushaertl.github.io/nextcloud-docker-dev/), thats why look `pwd` in repo folder and change `~/path/to/appid` and `appid`, look also if other instances with different versions are still running

```
docker run --rm -p 8080:80 -e SERVER_BRANCH=v28.0.6 \
  -v $(pwd):/var/www/html/apps-extra/fairmeeting \
  ghcr.io/juliushaertl/nextcloud-dev-php80:latest
```

- then go to http://localhost:8080/index.php/settings/apps, login with u: admin pw: admin, and activate the 'fairmeeting app'

## Changelog

[See CHANGELOG.md](./CHANGELOG.md)

## Translations

```
wget https://github.com/nextcloud/docker-ci/raw/master/translations/translationtool/translationtool.phar
chmod u+x translationtool.phar
./translationtool.phar create-pot-files
./translationtool.phar convert-po-files
```

## Licence

AGPL, see [LICENCE](./LICENCE).
