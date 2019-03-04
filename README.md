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
  1 => 
    array (size=6)
      'ID' => int 115
      'post_url' => string 'http://exempel.se/puffar/min-forsta-puff/' (length=41)
      'post_name' => string 'min-forsta-puff' (length=15)
      'post_content' => string 'Innehåll för min första puff' (length=28)
      'image' => string '<img width="400" height="180" src="http://exempel.se/app/uploads/2018/11/nyhet_3.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://exempel.se/app/uploads/2018/11/nyhet_3.jpg 400w, http://exempel.se/app/uploads/2018/11/nyhet_3-300x135.jpg 300w" sizes="(max-width: 400px) 100vw, 400px" />' (length=331)
      'image_url' => string 'http://exempel.se/app/uploads/2018/11/nyhet_3.jpg' (length=49)
  2 => 
    array (size=6)
      'ID' => int 116
      'post_url' => string 'http://exempel.se/puffar/min-andra-puff/' (length=40)
      'post_name' => string 'min-andra-puff' (length=14)
      'post_content' => string 'Innehåll för mind andra puff' (length=27)
      'image' => string '<img width="400" height="180" src="http://exempel.se/app/uploads/2018/11/nyhet_2.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://exempel.se/app/uploads/2018/11/nyhet_2.jpg 400w, http://exempel.se/app/uploads/2018/11/nyhet_2-300x135.jpg 300w" sizes="(max-width: 400px) 100vw, 400px" />' (length=331)
      'image_url' => string 'http://exempel.se/app/uploads/2018/11/nyhet_2.jpg' (length=49)
```


## Versionhistorik

### 1.0.0
- Första version