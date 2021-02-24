<?php
namespace Grav\Plugin;

use Composer\Autoload\ClassLoader;
use Grav\Common\Plugin;
use GuzzleHttp\Client;
use SendinBlue\Client\Api\ContactsApi;
use SendinBlue\Client\Configuration;

/**
 * Class MailValidatorPlugin
 * @package Grav\Plugin
 */
class MailValidatorPlugin extends Plugin
{
    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'onPluginsInitialized' => [
                ['autoload', 100000], // TODO: Remove when plugin requires Grav >=1.7
                ['onPluginsInitialized', 0]
            ]
        ];
    }

    /**
    * Composer autoload.
    *is
    * @return ClassLoader
    */
    public function autoload(): ClassLoader
    {
        return require __DIR__ . '/vendor/autoload.php';
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized(): void
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }

        // Enable the main events we are interested in
        $this->enable([
            'onPageInitialized' => ['onPageInitialized', 0],
        ]);
    }

    /**
     * email lookup for sendinblue contacts
     */
    public function onPageInitialized() {
        if ($this->grav['uri']->route() === '/mail-validation' && isset($_REQUEST['mail'])) {
            $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $this->config()['api_key']);

            $apiInstance = new ContactsApi(
                new Client(),
                $config
            );
            try {
                $result = $apiInstance->getContactInfo($_REQUEST['mail']);
                if($result) {
                    $this->found();
                } else {
                    $this->notFound();
                }
            } catch (\Exception $e) {
                $this->notFound();
            }
        }
    }

    /**
     * return mail found
     */
    protected function found() {
        $statusMessage = [
            "status" => "mail found",
            "statuscode" => "200"
        ];
        echo (json_encode($statusMessage));
        exit(200);
    }

    /**
     * return mail not found
     */
    protected function notFound() {
        $statusMessage = [
            "status" => "mail not found",
            "statuscode" => "404"
        ];
        echo (json_encode($statusMessage));
        exit(404);
    }
}
