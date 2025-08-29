# API TESTING AND VALIDATION
This is the repository for the LinkedIn Learning course `API Testing And Validation`. The full course is available from [LinkedIn Learning][lil-course-url].

![lil-thumbnail-url]

## Course Description

How do you test your API to ensure it's working as intended and solving business problems? Most API testing doesn't actually test the API. In this course, Keith Casey teaches you how to test and validate your API by using behavior-driven development, or BDD, to test APIs via their external endpoints. Keith looks at the API from the consumer’s point of view, confirming that problems experienced by your end users are being solved. Join Keith in this course to learn how to prove that your APIs are working exactly as we expect today, tomorrow, and continuously.

_See the readme file in the main branch for updated instructions and information._
## Instructions
The course was built using PHP 8.2 and Behat 3.12 and these instructions are designed for that combination.

1. Ensure you have PHP installed. This course was built on PHP 8.2.x installed via Homebrew on a Mac.
2. Ensure you have Composer installed.
3. Download or clone this repository.
4. On your command line, move to the api-testing-workspace directory.
5. Install your environment via ./composer.phar install or equivalent depending on your Composer configuration. This will load Behat 3.12 and the Github SDK for you.
6. Run vendor/bin/behat --init to create the framework for your tests.

All of your code, feature specifications, etc will be in api-testing-workspace. If you ever get stuck, check out the api-testing-course directory for the completed solutions.

Note: Do not rename behat.dist.yml to behat.yml at this time. Once you do, Behat will look for additional information. You'll rename and configure that information during the course.


## Instructor
Keith Casey  
Software Development And Project Management                            

Check out my other courses on [LinkedIn Learning](https://www.linkedin.com/learning/instructors/keith-casey).


[0]: # (Replace these placeholder URLs with actual course URLs)

[lil-course-url]: https://www.linkedin.com/learning/api-testing-and-validation-22610641/
[lil-thumbnail-url]: https://media.licdn.com/dms/image/D560DAQEkqQwIdKXdbg/learning-public-crop_675_1200/0/1687799290970?e=2147483647&v=beta&t=6S4jBk5hRHW-6ipp6gMyExEPpHwoWuseGyZxAKt5k1U

