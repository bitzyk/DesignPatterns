
# Simple Factory

## Type: `Creational`

## What is Simple Factory?


The Simple Factory design pattern is a way to create objects in an organized manner,
where a separate class (the factory) is responsible for creating instances of other classes.
You can think of it as a "factory" that produces specific objects when needed, rather than
creating those objects directly in your code.

## Where it is used?

Simple Factory is used when a class can't anticipate the class of objects it must create.

## Real world examples in php frameworks or php libraries

- Laravel: `App::make()`
- Symfony: `ContainerBuilder::create()`
- Doctrine: `EntityManager::create()`
- PHPUnit: `TestCase::create()`


## How it is used?

1. Create an interface for the objects that will be created.
2. Create a factory class that will create the objects.
3. Create the objects that will be created by the factory class.
4. Use the factory class to create the objects.
5. Use the objects.

# Differences between Simple Factory and Factory Method


The Factory Method and Simple Factory design patterns are both used to handle object creation, but they differ in structure and flexibility. Here are the key differences:

1. Class Responsibility
   Simple Factory:

A separate class (the factory) is responsible for creating all types of objects.
The client code calls the factory and specifies the type of object it wants.
The factory has a method (like createPizza) that decides which concrete object to create based on parameters.
All creation logic is centralized in one place (the factory).
Factory Method:

Creation responsibility is delegated to subclasses, each of which implements or overrides the factory method to produce its own specific product.
Instead of one central factory, you have different subclasses that define how objects are created.
Each subclass decides what to instantiate.
2. Extensibility
   Simple Factory:
   Not as flexible. To add new product types, you would need to modify the factory class, breaking the "Open/Closed Principle" (you modify the class instead of extending it).
   Factory Method:
   More flexible. To add new product types, you can simply create new subclasses without changing existing code. This adheres to the "Open/Closed Principle" (you extend the code rather than modify it).
3. Inheritance vs. Composition
   Simple Factory:
   Uses composition. The factory class is typically used by the client, and it does not rely on inheritance.
   Factory Method:
   Relies on inheritance. The method that creates objects is overridden by subclasses to create specific objects.
4. When to Use
   Simple Factory:
   Use it when you have a limited number of object types and your application does not need a lot of flexibility in terms of object creation.
   Good for simpler use cases where the factory doesn't need to be extended often.
   Factory Method:
   Use it when you expect to add new object types frequently, and you want to avoid modifying existing code. It's more scalable and suitable when object creation needs to be more flexible or varied.


