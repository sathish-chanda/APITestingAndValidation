Feature: Unstar a repository

    Scenario: I want to unstar an important repository
    Given I am an authenticated user
    When I unstar my "awesome-todo" repository
    Then my "awesome-todo" repository will not list me as a stargazer