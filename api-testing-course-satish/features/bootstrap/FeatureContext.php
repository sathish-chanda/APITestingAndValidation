<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    protected $monkeyCount = 0;

    protected $client = null;
    protected $results = null;
    protected $params = null;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct( array $parameters = [] )
    {
        $this->params = $parameters;
        $this->client = new \Github\Client();
        $this->result = null;
    }

        /**
     * @Given I have :arg1 monkeys
     */
    public function iHaveMonkeys($arg1)
    {
        $this->monkeyCount = (int) $arg1;
    }

    /**
     * @When I get :arg1 more monkeys
     */
    public function iGetMoreMonkeys($arg1)
    {
        $this->monkeyCount += (int) $arg1;
    }

    /**
     * @Then I should have :arg1 monkeys
     */
    public function iShouldHaveMonkeys($arg1)
    {
        assert($this->monkeyCount == $arg1, "We expected $arg1 monkeys but found " . $this->monkeyCount);
    }

    /**
     * @Given I am an anonymous user
     */
    public function iAmAnAnonymousUser()
    {
        // do nothing. Every user in github is an anonymous user.
    }

    /**
     * @When I request a list of issues for the Symfony repository from user Symfony
     */
    public function iRequestAListOfIssuesForTheSymfonyRepositoryFromUserSymfony()
    {
        $issues = $this->client->issues()->all('Symfony','Symfony');
        $this->result = $issues;
    }

     /**
     * @When I request issues for the :arg1 repository from user :arg2
     */
    public function iRequestIssuesForTheRepositoryFromUser($arg1, $arg2)
    {
        $issues = $this->client->issues()->all($arg1,$arg2);
        $statusCode = $this->client->getLastResponse()->getStatusCode();
        if($statusCode != 200) {
           throw new Exception("Expected a 200 status code but got $statusCode instead!"); 
        }
        $this->result = $issues;
    }

    /**
     * @Then I should find at least :arg1 result
     */
    public function iShouldFindAtLeastResult($arg1)
    {
        if(count($this->result) < $arg1) {
            throw new Exception("Expected at least $arg1 result but got back " . count($this->result));
        }
    }


    /**
     * @Given I am an authenticated user
     */
    public function iAmAuthenticatedUser()
    {
        $this->client->authenticate(
            $this->params['github_token'], null, Github\AuthMethod::ACCESS_TOKEN
        );
    }

    /**
     * @When I request a list of my repositories
     */
    public function iRequestAListOfMyRepositories()
    {
        $repositories = $this->client->api('current_user')->repositories();
        $statusCode = $this->client->getLastResponse()->getStatusCode();
        if($statusCode != 200) {
            throw new Exception("Expected a 200 status code but got $statusCode instead!"); 
        }
        $this->results = $repositories;
    }

    /**
     * @Then the results should include a repository named :arg1
     */
    public function theResultsShouldIncludeARepositoryNamed($arg1)
    {
        foreach($this->results as $repo) {
            if($repo['name'] == $arg1) {
                return true;
            }
        }
        throw new Exception("Expected to find a repository called '$arg1' but it doesn't exists!");
    }
}
