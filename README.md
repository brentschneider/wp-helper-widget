# Persistent Widget


Contributors:      brentschneiuder
Tags:              metaboxes, widget, chat, persistent widget
Requires at least: Wordpress 4+
Tested up to:      4.8.2
License:           GPLv2 or later
License URI:       http://www.gnu.org/licenses/gpl-2.0.html

# Persistent Widget

Persistent widget adds a widget area to right hand side of the page.

__TL;DR__

- Add Persistent widget
- Add & setup Chatra
- Add info and donation urls
> initiate happy dance

### Chatra instlation and setup

Summery of chatrs insalation steps.

1. log into your Wordpress admin panel and go to Plugins → Add new.
2. Enter “chatra” into Search plugins field.
3. Install and activate plugin.
4. Go to Settings → Chatra chat.
5. Log in into app.chatra.io in another browser tab and copy the widget code from Set up & customize section.
6. Go back to Wordpress console, paste the code and press Save changes.


#### Add to Chatra settings page via the wp-admin area
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


### B. Add the following Javascript script to your theme. 

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


### C. Under wordpress > Appearance > widgets
 
Drag the persistent widget to the footer location.

In the three following felds:

#### Chat
Enter a title such as "Chat"
Add the JS trigger in the __url field__

`Chatra('show');Chatra('openChat', true)`

#### Info

Enter a title such as "Info"
Enter any valid URL


#### Give

Enter a title such as "Give"
Enter any valid URL