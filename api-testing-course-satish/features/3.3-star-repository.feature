Feature: Star a repository

    Scenario: I want to star an important repository
    Given I am an authenticated user
    When I star my "awesome-todo" repository
    Then my "awesome-todo" repository will list me as a stargazer