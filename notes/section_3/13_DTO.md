### Summary of DTOs in PHP Application Development

When developing applications, data transfer between different parts of the application is essential. This data can
originate from various sources such as browser requests, API responses, etc. Structuring this data effectively is
crucial, and this is where **DTOs (Data Transfer Objects)** come into play.

#### Key Points:

1. **Definition of DTO:**
    - A DTO is an object that carries data between processes, typically without containing any business logic.
    - It encapsulates data in a structured object form, rather than using loosely structured arrays.

2. **Usage of DTOs:**
    - DTOs can structure data for both request and response scenarios, making it easier to manage and understand data
      flow.
    - They prevent the use of "magical arrays," where keys might change depending on the source, leading to potential
      errors and confusion.

3. **Example Scenario:**
    - Suppose you have two different email validation APIs (`Emailable` and `AbstractAPI`), each returning differently
      structured data.
    - For `Emailable`, the status might be represented as `state`, while `AbstractAPI` might use `deliverability`.
    - Without DTOs, you’d need multiple conditional checks or conversions across your application, which can become
      error-prone and hard to maintain.

4. **Implementing DTOs:**
    - Create a DTO class, such as `EmailValidationResultDTO`, to standardize the data structure.
    - This class can have properties like `score` and `isDeliverable`, which are populated based on the response from
      the API.
    - Using DTOs, you can consistently access properties like `$result->score` regardless of the underlying API, making
      the code cleaner and less error-prone.

5. **Advantages of Using DTOs:**
    - **Consistency:** Ensure a uniform data structure across different services or layers.
    - **Type Safety:** DTOs allow you to define data types clearly, reducing bugs due to unexpected data formats.
    - **Immutability:** Typically, DTOs are immutable, meaning once created, their values don’t change, reducing side
      effects.
    - **Decoupling:** Decouple the internal application logic from the external data sources, making it easier to swap
      or change services without impacting the rest of the application.

6. **Potential Issues Without DTOs:**
    - Code would be filled with array key checks and conversions, leading to maintenance headaches and higher chances of
      bugs.
    - Adding or changing data sources would require extensive changes in multiple parts of the codebase.

7. **Advanced Usage:**
    - DTOs can be created using factory methods, static constructors, or even dedicated factory classes to handle
      complex object creation and dependency injection.

8. **Conclusion:**
    - DTOs provide a robust way to structure and transfer data in PHP applications, ensuring that data remains
      consistent and easy to handle across the entire application.
    - In the next lesson, concepts like Value Objects and their differences from DTOs will be explored.

### Practical Example:

```php
// DTO Class Definition
readonly class EmailValidationResultDTO {
    public function __construct(
        public int $score,
        public bool $isDeliverable
    ) {}
}

// Using DTO in a Service
class EmailValidationService {
    public function verifyEmail(string $email): EmailValidationResultDTO {
        // Assume $apiResponse is fetched from an external API.
        $apiResponse = $this->fetchApiResponse($email);

        // Mapping API response to DTO
        return new EmailValidationResultDTO(
            score: (int) $apiResponse['quality_score'] * 100, // Convert to int
            isDeliverable: $apiResponse['deliverability'] === 'DELIVERABLE'
        );
    }
}
```

Using DTOs like this simplifies data handling and makes the code easier to maintain and extend.