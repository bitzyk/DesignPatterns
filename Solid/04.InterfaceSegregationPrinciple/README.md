
# Interface Segregation Principle

The Interface Segregation Principle (ISP) states that a client should not be forced to implement
an interface that it does not use.

This principle is about the design of interfaces and is closely related to the Single Responsibility Principle.

The same example with square and rectangle can be used to illustrate the Interface Segregation Principle.
In this case a square should not implement a method that is not used by it - the `setHeight` method or the `setWidth` method,
because a square has only one side.
