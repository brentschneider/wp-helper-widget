# Persistant Widget


Contributors:      brentschneiuder
Tags:              metaboxes, widget, chat, persistant widget
Requires at least: Wordpress 4+
Tested up to:      4.8.2
License:           GPLv2 or later
License URI:       http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Persistant widget adds a widget area to right hand side of the page.


# Persistant Widget

__TL;DR__

- Add Persistant widget
- Add & setup Chatra
- Add info and donation urls


### Chatra instlation and setup

1. log into your Wordpress admin panel and go to Plugins → Add new.
2. Enter “chatra” into Search plugins field.
3. Install and activate plugin.
4. Go to Settings → Chatra chat.
5. Log in into app.chatra.io in another browser tab and copy the widget code from Set up & customize section.
6. Go back to Wordpress console, paste the code and press Save changes.


This is your widget snippet. Copy-paste it into the code of the pages you want to chat on. Right before the </head> tag is the best option.
To get yours, log into chatra and click on [set up & customize](https://app.chatra.io/settings/general).

```
<!-- Chatra {literal} -->
<script>
    (function(d, w, c) {
        w.ChatraID = 'qwerty8765309';
        var s = d.createElement('script');
        w[c] = w[c] || function() {
            (w[c].q = w[c].q || []).push(arguments);
        };
        s.async = true;
        s.src = (d.location.protocol === 'https:' ? 'https:': 'http:')
        + '//call.chatra.io/chatra.js';
        if (d.head) d.head.appendChild(s);
    })(document, window, 'Chatra');
</script>
<!-- /Chatra {/literal} -->
```


### B. Add the Javascript script to page. 

Chatra Javascript [referance](https://chatra.io/help/api/#api-reference)
```
<script>
window.ChatraSetup = {
    chatHeight: 350,
    colors: {
        buttonText: '#f600a5',
        buttonBg: '#fff'
    },
    startHidden: true
};
</script>

<!-- Chatra widget code -->
```


### C. Under wordpress widgets, drag the persistant widget to the footer location.

Enter a title such as "Chat"

Add the JS trigger in the url field

`Chatra('show');Chatra('openChat', true)`


