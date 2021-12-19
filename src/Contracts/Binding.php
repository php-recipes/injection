<?php

namespace PhpR\Injection\Contracts;

use Closure;

/**
 * Binding Contract
 *
 * This contract represents a binding within a dependency injection container. It contains all the core details
 * regarding a binding.
 *
 *      abstract    The class or interface that is being bound to.
 *      concrete    The value being bound, can be a class or function name, a closure, an object, or a callable.
 *      aliases     The classes or interfaces that this binding should be aliased to.
 *      shared      Whether the binding is shared, so should only be resolved once.
 *
 * @template A of object
 */
interface Binding
{
    /**
     * Get the abstract of this binding.
     *
     * The binding abstract is a class or interface that the binding targets. This is the value that the container
     * will search its bindings for when resolving dependencies.
     *
     * @return class-string<A>
     */
    public function abstract(): string;

    /**
     * Get the concrete of this binding.
     *
     * The binding concrete is the target that the container will use to resolve the abstract. This can be one of a
     * number of different values.
     *
     *      class(string)       The class name to be resolved, typically an implementation of the abstract.
     *      function(string)    The function name, will be called to resolve the abstract.
     *      instance(object)    An instance of the abstract to be used, always considered shared.
     *      closure(object)     A closure to be called to resolve the abstract.
     *      method(array)       An array of class & method or object & method, whether this has to be a valid
     *                          callable is entirely up to the implementation.
     *
     * If no value has been provided for this, it will default to be the abstract.
     *
     * @return class-string<A>|array|object<A|Closure>
     */
    public function concrete(): string|array|object;

    /**
     * Get the aliases of this binding.
     *
     * Binding aliases serve as a way to register a binding against multiple abstracts. Bindings registered with a
     * container, that have aliases, will also be bound as if those aliases were their abstract.
     *
     * Aliases should always be, in some way, a descendant of the abstract.
     *
     * @return array<class-string<A>>
     */
    public function aliases(): array;

    /**
     * Get the shared state of the binding.
     *
     * A shared binding will only be resolved once, allowing a binding to serve as a sort of singleton. Shared
     * bindings are useful when classes contain state that should persist across the entire codebase without being an
     * actual singleton.
     *
     * If the concrete is an object, this will always be true.
     *
     * @return bool
     */
    public function shared(): bool;
}