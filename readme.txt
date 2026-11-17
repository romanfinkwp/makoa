=== Makoa ===

Contributors: romanfink
Requires at least: 6.7
Tested up to: 7.1
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


== Changelog ==
= 1.0.8 =
* Fixed: category, tag, author and date archives, the blog index and search results showed all posts. Their Query Loops now inherit the main query
* Fixed: the Makoa stylesheet was not loaded when a child theme (for example Makoa Personal) was active
* Fixed: escaping of translatable strings in patterns
* Fixed: the welcome notice image did not load on sites installed in a subdirectory
* Security: dismissing the welcome notice now checks a nonce and the user capability; the notice is shown only to users who can manage the theme
* Tested up to WordPress 7.1

= 1.0.7 =
* Added About Theme page

= 1.0.6 =
* Tested up to 6.9

= 1.0.5 =
* Tested up to 6.8

= 1.0.4 =
* Initial release


== Installation ==

1. Check you version of WordPress, it should be 6.7 or later.
2. Upload the theme.
3. Activate the theme.


== Copyright ==

Makoa WordPress Theme, (C) 2024 Roman Fink
Makoa is distributed under the terms of the GNU GPL.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

Makoa is based on Papanek (https://wordpress.org/themes/papanek/), (C) Roman Fink, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)

== Licenses ==

Makoa bundles the following third-party resources:

DM Sans
License: SIL Open Font License, 1.1, https://opensource.org/licenses/OFL-1.1
Source: https://fonts.google.com/specimen/DM+Sans

Images in /assets/images/ from Pxhere.com
https://pxhere.com/en/license (Creative Commons Zero (CC0) license - https://creativecommons.org/publicdomain/zero/1.0/)
Minimal-Elegance.jpg https://pxhere.com/id/photo/1087225
Timeless-Gray.jpg https://pxhere.com/id/photo/1200849

Image in /assets/images/ from StockSnap.io
https://stocksnap.io/license (Creative Commons Zero (CC0) license - https://creativecommons.org/publicdomain/zero/1.0/)
makoa-photo.jpg https://stocksnap.io/photo/people-man-GKWUCWMSOB

assets/images/me.jpg (welcome notice and About page)
Photo of the theme author (Roman Fink), self-owned, released under GPLv2 or later

Photo in screenshot.png
https://stocksnap.io/license (Creative Commons Zero (CC0) license - https://creativecommons.org/publicdomain/zero/1.0/)
https://stocksnap.io/photo/people-man-GKWUCWMSOB