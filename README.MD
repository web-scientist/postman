# Postman

This is a package intended to create JSON export for Postman Collection.

## Disclaimer

*This project is still work in progress*

## Object Terminologies

Postman has a slightly different convention when it comes to the front end, as when compared to the JSON import/export schema. Here is a list of objects used and it's usage with reference to [Postman](https://www.postman.com/ "Postman API Platform").

|Name|Description|
|---|---|
| Collection | Top level container for all requests |
| Item | Alias for Folder. Used for directory like structure |
| Event | Contains pre-request and post-request (tests) scripts |
| Url | All url related data, including path variables |
| Header | Custom headers key value pair |
| Body | Request data, in case of POST, PUT and PATCH requests |
| Variable | Collection variables data |

## Postman Collection

A Postman collection can contain many Item (Folder) or Request objects

```php
use WebScientist\Postman\Services\PostmanService as Postman;

$postman = new Postman();

$collection = $postman->collection('My Collection Name');
```

## Creating Child Objects

### Item (Folder)

```php
$folder = $collection->folder($folderName);
```

### Request

```php
$request = $postman->request($requestName)
    ->url($url)
    ->header($key, $value)
    ->body($mode, $data)
    ->description($description);
```

### Header

Header can be applied to either Collection, Item or Request object by using the `header()` method.

```php
$collection->header($key, $value);
$item->header($key, $value);
$request->header($key, $value);
```
