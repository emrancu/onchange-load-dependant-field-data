#  Backpack Fields: Onchange load dependant field options/data  
[![Latest Version on Packagist][ico-version]][link-packagist] 
[![Total Downloads][ico-downloads]][link-downloads]

This package provides a ```dependantFieldOptions``` field type for the [Backpack for Laravel](https://backpackforlaravel.com/) administration panel. The ```dependantFieldOptions``` field allows admins to load options from provided ```source``` through provided ```method```  depending on-change in parent/specefic field.

## Screenshots


 ![Backpack Star Field Addon](https://res.cloudinary.com/ogroosoft/image/upload/v1629483462/screenshots/uapm0xclg9xorxjagt9b.gif)
 
 
 
 ## Installation

Via Composer

``` bash
composer require ogroosoft/onchange-load-dependant-field-data
```
 
 ## Usage

Inside your CrudController:

```php
CRUD::addField([
       'view_namespace' => 'ogroosoft-onchange-field-options::fields',
       'type' => "dependantFieldOptions",
       'dependency_name' => 'surah_id', // write (parent/specefic) field name, when the field's value will change then load this field options
       'label' => "Verse",
       'name' => 'verse_id',
       'source' => route('surah.verses'),
       'attribute' => 'verse_no', // option's key name for showing option label
      // 'source_method' => 'post', //  by default post
      // 'id' => 'field_id',
      // 'placeholder' => 'placeholder', // by default "-"
      // 'hint' => 'hint',
  ]);
```


##  Uninstall this package. Since it only provides one file - ```star.blade.php```, and you're no longer using that file, it makes no sense to have the package installed:
```bash
composer remove ogroosoft/onchange-load-dependant-field-data
```
 
 
 ## Security

If you discover any security related issues, please email [the author](composer.json) instead of using the issue tracker.


## License

MIT. Please see the [license file](license.md) for more information.

<p>Developed by : <a href="https://github.com/emrancu">AL EMRAN</a></p>
 
 [ico-version]: https://img.shields.io/packagist/v/ogroosoft/onchange-load-dependant-field-data.svg
[ico-downloads]: https://img.shields.io/packagist/dt/ogroosoft/onchange-load-dependant-field-data.svg
 
[link-packagist]: https://packagist.org/packages/ogroosoft/onchange-load-dependant-field-data
[link-downloads]: https://packagist.org/packages/ogroosoft/onchange-load-dependant-field-data
 
 

