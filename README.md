# Skapar post_typen Blurbs, dvs puffar + visa dessa puffar på en sida

## Hur man använder Region Hallands plugin "region-halland-acf-page-links-blurbs"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-acf-page-links-blurbs".


## Användningsområde

Denna plugin skapar en posttyp med namn "Puffar". Dessa puffar kan man sedan välja att visa på en sida.


## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-acf-page-links-blurbs.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-acf-page-links-blurbs.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-acf-page-links-blurbs": "1.0.0"
},
```


## Loopa ut länkarna via "Blade"

```sh
@php($myBlurbs = get_region_halland_acf_main_post_page_links_blurbs())
@if(isset($myBlurbs))
  @foreach ($myBlurbs as $blurbs)
    <span><a href="{{ $blurbs['post_url'] }}">{{ $blurbs['post_name'] }}</a></span><br>
    <span>{!! $blurbs['image'] !!}</span><br>
    <span>{{ $blurbs['post_content'] }}</span>
    <span><a href="{{ $blurbs['link_url'] }}" target="{{ $blurbs['link_target'] }}">{{ $blurbs['link_title'] }}</a></span><br>
  @endforeach
@endif
```


## Exempel på hur arrayen kan se ut

```sh
array (size=3)
  0 => 
    array (size=6)
      'ID' => int 117
      'post_url' => string 'http://exempel.se/puffar/min-tredje-puff/' (length=41)
      'post_name' => string 'min-tredje-puff' (length=15)
      'post_content' => string 'Innehåll för min tredje puff' (length=28)
      'image' => string '<img width="400" height="180" src="http://exempel.se/app/uploads/2018/11/nyhet_1.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://exempel.se/app/uploads/2018/11/nyhet_1.jpg 400w, http://exempel.se/app/uploads/2018/11/nyhet_1-300x135.jpg 300w" sizes="(max-width: 400px) 100vw, 400px" />' (length=331)
      'image_url' => string 'http://exempel.se/app/uploads/2018/11/nyhet_1.jpg' (length=48)
      'link_title' => string 'Donec Ut Pulvinar' (length=17)
      'link_url' => string 'http://exempel.se/mauris-id-consectetur/donec-ut-pulvinar/' (length=58)
      'link_target' => string '' (length=0)

  1 => 
    array (size=6)
      'ID' => int 115
      'post_url' => string 'http://exempel.se/puffar/min-forsta-puff/' (length=41)
      'post_name' => string 'min-forsta-puff' (length=15)
      'post_content' => string 'Innehåll för min första puff' (length=28)
      'image' => string '<img width="400" height="180" src="http://exempel.se/app/uploads/2018/11/nyhet_3.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://exempel.se/app/uploads/2018/11/nyhet_3.jpg 400w, http://exempel.se/app/uploads/2018/11/nyhet_3-300x135.jpg 300w" sizes="(max-width: 400px) 100vw, 400px" />' (length=331)
      'image_url' => string 'http://exempel.se/app/uploads/2018/11/nyhet_3.jpg' (length=49)
      'link_title' => string 'Pellentesque Ipsum' (length=18)
      'link_url' => string 'http://exempel.se/mauris-id-consectetur/pellentesque-ipsum/' (length=59)
      'link_target' => string '' (length=0)
  2 => 
    array (size=6)
      'ID' => int 116
      'post_url' => string 'http://exempel.se/puffar/min-andra-puff/' (length=40)
      'post_name' => string 'min-andra-puff' (length=14)
      'post_content' => string 'Innehåll för mind andra puff' (length=27)
      'image' => string '<img width="400" height="180" src="http://exempel.se/app/uploads/2018/11/nyhet_2.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://exempel.se/app/uploads/2018/11/nyhet_2.jpg 400w, http://exempel.se/app/uploads/2018/11/nyhet_2-300x135.jpg 300w" sizes="(max-width: 400px) 100vw, 400px" />' (length=331)
      'image_url' => string 'http://exempel.se/app/uploads/2018/11/nyhet_2.jpg' (length=49)
      'link_title' => string 'Sök på Google' (length=13)
      'link_url' => string 'http://www.google.com' (length=21)
      'link_target' => string '_blank' (length=6)
```

## Hämta ut en enskild "blurb" via Blade

```sh
@php($myBlurb = get_region_halland_acf_page_links_single_blurb(116))
@if(isset($myBlurb))
    <span><a href="{{ $blurb->post_url }}">{{ $blurb->post_title }}</a></span><br>
    <span>{!! $blurb->image !!}</span><br>
    <span>{{ $blurb->post_content }}</span>
    <span><a href="{{ $blurb->link_url }}" target="{{ $blurb->link_target }}">{{ $blurb->link_title }}</a></span><br>
 @endif
```


## Hämta ut en enskild "blurb" via Blade

```sh
object(WP_Post)[6859]
  public 'ID' => int 116
  public 'post_author' => string '1' (length=1)
  public 'post_date' => string '2019-02-28 09:33:41' (length=19)
  public 'post_date_gmt' => string '2019-02-28 08:33:41' (length=19)
  public 'post_content' => string 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.' (length=65)
  public 'post_title' => string 'Min andra puff' (length=14)
  public 'post_excerpt' => string '' (length=0)
  public 'post_status' => string 'publish' (length=7)
  public 'comment_status' => string 'closed' (length=6)
  public 'ping_status' => string 'closed' (length=6)
  public 'post_password' => string '' (length=0)
  public 'post_name' => string 'min-andra-puff' (length=14)
  public 'to_ping' => string '' (length=0)
  public 'pinged' => string '' (length=0)
  public 'post_modified' => string '2019-03-06 12:57:43' (length=19)
  public 'post_modified_gmt' => string '2019-03-06 11:57:43' (length=19)
  public 'post_content_filtered' => string '' (length=0)
  public 'post_parent' => int 0
  public 'guid' => string 'http://exempel.se/?post_type=blurbs&#038;p=116' (length=46)
  public 'menu_order' => int 0
  public 'post_type' => string 'blurbs' (length=6)
  public 'post_mime_type' => string '' (length=0)
  public 'comment_count' => string '0' (length=1)
  public 'filter' => string 'raw' (length=3)
  public 'url' => string 'http://stage-demo.local/puffar/min-andra-puff/' (length=46)
  public 'image' => string '<img width="400" height="180" src="http://stage-demo.local/app/uploads/2018/11/nyhet_2.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://stage-demo.local/app/uploads/2018/11/nyhet_2.jpg 400w, http://stage-demo.local/app/uploads/2018/11/nyhet_2-300x135.jpg 300w" sizes="(max-width: 400px) 100vw, 400px" />' (length=349)
  public 'image_url' => string 'http://exempel.se/app/uploads/2018/11/nyhet_2.jpg' (length=55)
  public 'link_title' => string 'Go to google' (length=12)
  public 'link_url' => string 'http://www.google.com' (length=21)
  public 'link_target' => string '_blank' (length=6)
```


## Versionhistorik

### 1.2.0
- Funktion för att hämta enskild blurb

### 1.1.0
- Lagt till ACF-länk på puff-sidan

### 1.0.0
- Första version