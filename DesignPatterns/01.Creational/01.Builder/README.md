
# Builder

What problems can the Builder design pattern solve?

- class constructor require a lot of information
- objects that need other objects or "parts" to construct them


## What is Builder?

- We have a complex process to construct an object involving multiple steps, 
the Builder pattern is a good choice.
- in builder we remove the logic related to the construction of a complex object from
the client code & abstract it in separate classes.


## Where it is used?

- Some good examples are in ORM like Doctrine, Eloquent, etc.
- In Laravel, the Query Builder is a good example of the Builder pattern.
- In Symfony, the FormBuilder is a good example of the Builder pattern.

# Documentation

In ExampleInitial I've used a Director class to build the object.
However, in real life scenarios, the Director class is not always necessary. The client will often directly use the Builder class to build the object.

In ExampleFinal I've removed the Director class and the client directly uses the Builder class to build the object.
Also i'm using builder to build only parts of the object.
