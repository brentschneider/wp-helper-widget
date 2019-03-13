# Persistent Widget


Contributors:      brentschneider
Tags:              widget, chatra
Requires at least: Wordpress 4+
Tested up to:      4.8.2
License:           GPLv2 or later
License URI:       http://www.gnu.org/licenses/gpl-2.0.html

# Persistent Widget

The persistent widget adds a widget area to right hand side of the page.

__TL;DR__

- Add Persistent widget
- Add & setup Chatra
- Add info and donation urls
> `npm install happy-dance`


## Under wordpress > Appearance > widgets
 
Drag the persistent widget to a widget location.
Instalation guide: https://codex.wordpress.org/Widgetizing_Themes

### Enter the following felds:

##### Display on Mobile or Desktop

    _id field_
    View on Mobile: `persistant_widget__mobile`
    View on Desktop: `persistant_widget__desktop`

##### Chat

    _Title_
    Enter a title such as "Chat"

    _URL_
    Add the JS trigger in the __url field__
    `Chatra('show');Chatra('openChat', true)`

##### Info

    _Title_
    Enter a title such as "Info"
    _URL_
    Enter any valid URL


##### Give

    _Title_
    Enter a title such as "Give"
    _URL_
    Enter any valid URL

---

## Chatra installation and setup

Summery of Chatra's installation steps.

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
    chatWidth: 400,
    chatHeight: 550,
    colors: {
        buttonText: '#a10022',
        buttonBg: '##333333'
    },
    startHidden: true
};
</script>

<!-- Chatra widget code -->
```


### How to hide the standard button

Using CSS:

```
<style>
#chatra:not(.chatra--expanded) {
  visibility: hidden !important;
  opacity: 0 !important;
  pointer-events: none;
}
</style>
```

#### Related info: 

https://chatra.io/help/api/#passing-arbitrary-info
