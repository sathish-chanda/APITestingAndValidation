Feature: Get a list of issues with variables
    
    Scenario: I want to get the list of the issues for the Symfony repository

        Given I am an anonymous user
        When I request issues for the "Symfony" repository from user "Symfony"
        Then I should find at least "1" result