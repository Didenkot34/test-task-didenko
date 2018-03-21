<?php

namespace App\Command;

use GuzzleHttp\Client;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class CreateEntity extends ContainerAwareCommand
{
    protected $router;
    private $description = 'Creates a new Entity in DB.';


    /**
     * CreateEntity constructor.
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        parent::__construct(null);
        $this->router = $router;
    }


    protected function configure(): void
    {
        $this->setName($this->getConsoleName())
            ->setDescription($this->getDescription());
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $output->writeln([
            '============',
            'Entity Creator',
            '============',
            'Done!!!',
        ]);

        //get result from Api
        $resultFromApi = $this->sendRequestByCurl('GET', $this->getApiUrl());

        // set result to Offer
        $this->sendRequestByCurl('POST',
            $this->getUrlForSaveEntity([]),
            [
                'form_params' => [
                    'data' => \GuzzleHttp\json_encode($resultFromApi)
                ]
            ]);
    }

    /**
     * The short description shown while running "php bin/console list"
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Send request using curl
     * @param string $method
     * @param string $url
     * @param array $params
     * @return array
     */
    public function sendRequestByCurl(string $method, string $url, array $params = []): array
    {
        $client = new Client();
        $result = $client->request($method, $url, $params);
        return json_decode($result->getBody(), true) ?? [];
    }

    /**
     * @param array $params
     * @return string
     */
    public function getUrlForSaveEntity(array $params): string
    {
        $context = $this->router->getContext();
        $context->setHost($this->getHost());
        $context->setScheme($this->getSchema());
        return $this->router->generate($this->getLocalRout(), $params, 0);
    }

    public abstract function getApiUrl(): string;

    /**
     * The name of the console command (the part after "bin/console")
     * @return string
     */
    public abstract function getConsoleName(): string;

    /**
     * @return string
     * Example :  http
     */
    public abstract function getSchema(): string;

    /**
     * Get the host name for creating Entity
     * @return string
     * Example :  27.0.0.1:8000 or test.com
     */
    public abstract function getHost(): string;

    /**
     * Get local routs name for creating Entity
     * @return string
     * Example :  create_offer
     */
    public abstract function getLocalRout(): string;


}