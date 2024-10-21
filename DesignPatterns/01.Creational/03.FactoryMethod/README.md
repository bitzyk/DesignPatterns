
# Factory Method

## Type: `Creational`

## What is Factory Method?

Factory Method is a creational design pattern that provides an interface for creating objects in a superclass, but allows subclasses to alter the type of objects that will be created.


## Where it is used?

We want to move the object creation logic to a separate class
We don't know in advance which class we may need to instantiate beforehand & also to allow new classes to be added without modifying the factory class
We let subclasses decide which class to instantiate by overriding the factory method

## Real world examples in php frameworks or php libraries

- Laravel: `Illuminate\Database\Connectors\ConnectionFactory` class uses the Factory Method pattern to create database connections.
- Symfony: `Symfony\Component\Translation\Translator` class uses the Factory Method pattern to create translation loaders.
- Magento: `Magento\Framework\ObjectManager\Factory\AbstractFactory` class uses the Factory Method pattern to create objects.
- Yii: `yii\db\Connection` class uses the Factory Method pattern to create database connections.
- Doctrine: `Doctrine\DBAL\DriverManager` class uses the Factory Method pattern to create database connections.



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


