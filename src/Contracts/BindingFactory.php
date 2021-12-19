<?php

namespace PhpR\Injection\Contracts;

/**
 * BindingFactory Contract
 *
 * This contract represents a factory used for the creation of a binding. There is a certain level of processing
 * expected by an implementation of this, with the aim of simplifying its usage.
 *
 *
 * @template A of object
 * @see      \PhpR\Injection\Contracts\Binding
 * @package  Binding
 */
interface BindingFactory
{
    /**
     * Set the abstract for the binding.
     *
     * If the provided value is an object its class should be used, and the concrete should be set to the object.
     *
     * @param class-string<A>|object<A> $abstract
     *
     * @return static
     *
     * @see \PhpR\Injection\Contracts\Binding::abstract()
     */
    public static function from(string|object $abstract): static;

    /**
     * Set the concrete for the binding.
     *
     * This can be one of a number of different values.
     *
     *      class(string)       The class name to be resolved, typically an implementation of the abstract.
     *      function(string)    The function name, will be called to resolve the abstract.
     *      instance(object)    An instance of the abstract to be used, always considered shared.
     *      closure(object)     A closure to be called to resolve the abstract.
     *      method(array)       An array of class & method or object & method, whether this has to be a valid
     *                          callable is entirely up to the implementation.
     *
     * @param class-string<A>|string|array{A|class-string<A>, string}|object<A> $concrete
     *
     * @return static
     *
     * @see \PhpR\Injection\Contracts\Binding::concrete()
     */
    public function to(string|array|object $concrete): static;

    /**
     * Set the aliases for the binding.
     *
     * A bindings aliases should either be a descendant of the abstract, or a parent of the concrete value.
     *
     * @param string ...$aliases
     *
     * @return static
     *
     * @see \PhpR\Injection\Contracts\Binding::aliases()
     */
    public function as(string ...$aliases): static;

    /**
     * Mark the binding as shared.
     *
     * @return static
     *
     * @see \PhpR\Injection\Contracts\Binding::shared()
     */
    public function share(): static;

    /**
     * Add the binding to the container.
     *
     * Create a binding and add it to the container.
     *
     * @param \PhpR\Injection\Contracts\Container $container
     *
     * @return \PhpR\Injection\Contracts\Binding
     *
     * @see \PhpR\Injection\Contracts\Container
     * @see \PhpR\Injection\Contracts\Binding
     */
    public function bind(Container $container): Binding;
}