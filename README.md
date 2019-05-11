# Chuck Norris Jokes

Create and use random chuch norris jokes in your PHP application.

## Installation

Get the library into you application using composer package manager.

```php
composer require neyosoft/chuck-norris-jokes
```

## Usage

```python
use Neyosoft\ChuckNorrisJoke\Factories\JokeFactory;

$jokes = new JokeFactory();

$jokes->add($new_joke);

$joke = $jokes->getRandom();
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](./LICENSE.md)