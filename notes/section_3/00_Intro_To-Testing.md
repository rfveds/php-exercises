### Testing Types
- **Unit Testing**: Testing individual units or components of a software.
- **Integration Testing**: Testing the integration of different components or systems.
- **Functional Testing**: Testing the functionality of the software.
- **End-to-End Testing**: Testing the entire software application from start to finish.

#### Unit Testing
- Tests small piece of code (i.e. method or function) & mocks/fakes any needed dependencies or database connections.

#### Integration Testing
- Tests multiple modules or units together(i.e. method that connects to database, runs queries & returns something). Dependencies can be resolved & can use database connection.

### TDD (Test Driven Development)
- Write tests before writing code.
- Red-Green-Refactor cycle:
  - **Red**: Write a failing test.
  - **Green**: Write the minimum code to pass the test.
  - **Refactor**: Refactor the code to make it clean & maintainable.
