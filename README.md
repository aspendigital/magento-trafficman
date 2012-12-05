# Magento Trafficman

Trafficman adds support to Magento for hosting skin, media, and js (including cached product images) on a remote server. Fixes issues casued by changing Base URLs for skin, media, and js to a remote server.

For Magento CE 1.7

## How it works

Magento uploader and TinyMCE references in the admin templates are set to the local root so Magento Base JS URLs can be set remotely.

The Image Helper has references images local to the site on first load to avoid race conditions or sync delays. If the image is cached, the remote URL is used.


## Installation

1. If [modman](https://github.com/colinmollenhour/modman) is not yet installed, install it and run `modman init` in the Magento root.
2. Run `modman clone magento-trafficman git://github.com/aspendigital/magento-trafficman.git`
3. Set up service sync for skin, media and/or js. (e.g. Alex's Live Syncing Daemon [lsyncd](https://github.com/axkibe/lsyncd))
4. Update skin, media and/or js base URLS in the Magento Admin (System -> Configuration -> Web) 


## Issues

The magento uploader and TinyMCE references are currently set to reference the site root. Must be altered if your installation exists in a subfolder.

## License

Copyright 2012 [Aspen Digital](http://www.aspendigital.com/)

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.