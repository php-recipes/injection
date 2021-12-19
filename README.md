# Recipe: Injection

![Packagist Version](https://img.shields.io/packagist/v/php-recipes/injection)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/php-recipes/injection)
![GitHub](https://img.shields.io/github/license/php-recipes/injection)
[![codecov](https://codecov.io/gh/php-recipes/injection/branch/main/graph/badge.svg?token=FHJ41NQMTA)](https://codecov.io/gh/php-recipes/injection)
[![Build Status](https://travis-ci.com/php-recipes/injection.svg?branch=main)](https://travis-ci.com/php-recipes/injection)

A supporting package for dealing with injection in PHP. This packages includes a series of interfaces, traits,
attributes and helpers for dealing with all forms of dependency injection in PHP.

## Install

Install via composer.

```bash
$ composer require php-recipes/injection
```

## Usage

This package is designed to be implemented, providing a common modern base of dependency injection, serving as either an
alternative to PSRs or to bolster them.

### Bindings

Bindings are at the core of all types of dependency injection, and this package provides a handful of ways to simplify
them.

#### Binding Object

Within this package there is a contract that represents a binding within a container.

```
PhpR\Injection\Contracts\Binding
```

This object represents the core of a binding, including:

| Name     | Description                                                                                                                                                                                                | Method                |
|----------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-----------------------|
| Abstract | The core abstract target of a binding, a class or interface that the container will be looking for when resolving a dependency.                                                                            | `Binding::abstract()` |
| Concrete | The concrete value, either a class, function, closure, object, callable or other array that tells the container what to actually resolve, or how to.                                                       | `Binding::concrete()` |
| Aliases  | A collection of other classes or interfaces that the are children of the abstract, or parents of the concrete. Bindings with aliases are bound to each of those aliases as if they were also the abstract. | `Binding::aliases`    |
| Shared   | A shared binding is one that should only be resolved once, functioning as if it is a singleton.                                                                                                            | `Binding::shared()`   |

#### Binding Factory

This package also provides a factory for creating binding objects.

```
PhpR\Injection\Contracts\BindingFactory
```

A factory lets you set the core values of a binding in a fluent builder like approach.

| Method                       | Description                                                                                              | Returns                                                                                                                                                                                  |
|------------------------------|----------------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `from(string\| object $abstract)`                                                                                       | A static method used to create a new instance of the factory. If an object is provided, the class for that object is used as the actual abstract, and the object is used as the concrete. | `BindingFactory`        |
| `to(string\| array\|object $concrete)`                                                                                                                                                                        | Set the concrete for the binding. This can be a class name, function name, closure, object, callable or other array. if an object was provided for the abstract, any additional calls to this method should be ignored.            | `BindingFactory`        |
| `as(string ...$aliases)`     | Provide multiple class names that this binding should be aliased to.                                     | `BindingFactory`                                                                                                                                                                         |
| `share()`                    | Mark the binding as shared                                                                               | `BindingFactory`                                                                                                                                                                         |
| `bind(Container $container)` | Create an instance of the binding, register it with the provided container, and then return the binding. | `Binding`                                                                                                                                                                                |



## Testing

Run the tests via composer.

```bash
$ composer phpunit
```

Or if you want code-coverage

```bash
$ composer phpunit-coverage
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](https://github.com/php-recipes/injection/blob/master/LICENSE.md) for
more information.