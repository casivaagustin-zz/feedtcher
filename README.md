Feedtcher
=========

Library to feetch RSS or ATOM Feeds

How to use it
=============

Just add this library to your composer.json, or set the paths for your autoloader.
Add PHRequests as dependency also.

And just do something like this in your code.

```php
    $url = 'http://casivaagustin.com.ar/?feed=rss2'; 
    $feedtcher = new Feedtcher\Feedtcher($url);
    $feed = $feedtcher->fetch();
```

This will return a Feed Object with a collection of Entries. Feed does not
have all the possible entries from the feed, it just fetch.

 - Title
 - Description
 - Link
 - Date
 - Author

And Entries have

 - Title
 - Description
 - Author 
 - Date 
 - Link

To get Feed fields just read as attributes.

```php
  $feed->title ...
  $feed->link  ...
```

And for Entries use the feed object as array

```php
  $feed[0]->title ...
  $feed[0]->description ...
  $feed[0]->author ...
```

Works with RSS and ATOM.

That is all !




















